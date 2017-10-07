<div class="chat" data-ng-controller="ChatController">
    <div class="mini-chat" id="mini-chat">
        <div class="before-chat">
            <i class="fa fa-comments" aria-hidden="true"></i>
        </div>
        <div class="during-chat">
            <img src="" alt=""/>
            <span class="chat-notification"></span>
        </div>
    </div>
    <div class="chat-pannel" id="chat-pannel">
        <div class="wrapper">

            <!-- Chat header start here -->
            <div class="chat-header">
                <div class="option-menu">
                    <ul>
                        <li>
                            <a href="">
                                <img src="assets/images/chat/menu-left.svg">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="assets/images/chat/menu-home.svg">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="assets/images/chat/menu-user.svg">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="assets/images/chat/menu-group.svg">
                            </a>
                        </li>
                        <li class="menu-right">
                            <a href="">
                                <img src="assets/images/chat/menu-close.svg">
                            </a>
                        </li>
                        <div class="clear"></div>
                    </ul>
                </div>
                <div class="left" id="open-menu"></div>
                <h2>Jaffna Teaching Hospital Staffs
                    <span>{!! $totalStaffs or 0 !!} staffs </span>
                </h2>
                <div class="right"  id="close-chat"></div>
                <div class="clear"></div>
            </div>

            <!-- Chat body start here -->
            <div class="chat-body">
                <div class="messages-wrapper">
                    <div ng-repeat="message in messages track by $index">
                        <div class="received-meassage" ng-if="authUserId != message.user_id">
                            <div class="tumb-image"><img src="assets/images/chat/user.svg"></div>
                            <div class="meassage">
                                <p class="text">
                                    <b class="name">@{{ message.userName }}</b>
                                    <span class="name">@{{ message.msg }}</span>
                                    <em class="triangle"></em>
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="sent-meassage" ng-if="authUserId == message.user_id">
                            <div class="meassage">
                                <p class="text">
                                    <span class="name">@{{ message.msg }}</span>
                                </p>
                                <div class="clear"></div>
                            </div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- chat footer start here -->
            <div class="chat-footer">
                <div class="chatbox">
                    <textarea ng-model="message" ng-keyup="$event.keyCode == 13 && msgClick();" placeholder="Type meassage here.." class="textbox" id="textbox"></textarea>
                    <button class="send-chat-meassage" ng-click="msgClick();"></button>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
    </div>
</div>
@section('chat-script')
<script>
    chat.Class = "chat";
    chat.posstion = {
        x: 20,
        y: 20
    };
    chat.push();

    app.controller('ChatController', ['$scope', '$http', function ($scope, $http) {

        $scope.moduleUrl = "{!! route('group.chat') !!}";
        $scope.authUserId ='{!! Auth::user()->id !!}';
        var person_name = $scope.authUserName ='{!! Auth::user()->name !!}';
        var url = "{{ url('/') }}";
        var port = {{ env('RT_SERVER_PORT', '6002') }};
        var socket = io(url + ':' + port + '/');

        $scope.messages = [];

//        if (!(localStorage.getItem("messages") === null)) {
//            $scope.messages = JSON.parse(localStorage.getItem("messages"));
//
//        } else {
//            oldMessages.forEach(function(item, index) {
//                $scope.messages.push({msg:item.message, userName: item.user.name, user_id: item.user.id});
//            });
//            localStorage.setItem("messages", JSON.stringify($scope.messages));
//        }

        socket.on("chat-room.1:App\\Events\\ChatMessageWasReceived", function (message) {
            $scope.messages.push({msg:message.chatMessage.message, userName: message.user.name, user_id: message.user.id});
            $scope.$apply();
            scrollDown();
        });

        var user = {!! Auth::User() !!}

        socket.on('onlineUsers', function (data) {
            var userIds = _.union(_.pluck(data.users, 'id'));
            userIds.forEach(function(item, index) {
                if(_.isNumber(item)) {
                    $('.' + data.users[item].name + item).addClass('online');
                }
            });
        });

        socket.on('connect', function () {
            socket.emit('newUser', user);
            socket.on('disconnected', function() {
                //                $('.' + person_name).addClass('offline');
                socket.emit('delUser', user);
            });
        });

        socket.on('offlineUsers', function (data) {
            var userIds = _.union(_.pluck(data.users, 'id'));
            userIds.forEach(function(item, index) {
                if(_.isNumber(item)) {
                    $('.' + data.users[item].name + item).removeClass('online');
                }
            });
        });

        $scope.msgClick = function() {
            if($scope.message) {
                var data = {};
                data.socket_id = socket.io.engine.id;
                data.msg = $scope.message;
                data.type = 'group';

                $http.post($scope.moduleUrl + '?ajax=true', data).success(function (response) {
                    console.log(response);
                });

                scrollDown();
                $scope.message = null;
            }
        };

        var scrollDown = function() {
            var messageWrraperHeight = $(".messages-wrapper").height();
            $(".chat-body").animate({scrollTop: messageWrraperHeight}, "slow");
        };

        var oldMessages = {!! $chatMessages !!}
        oldMessages = oldMessages.reverse();
        oldMessages.forEach(function(item, index) {
            $scope.messages.push({msg:item.message, userName: item.user.name, user_id: item.user.id});
        });

        $(document).ready(function () {
            scrollDown();
        });

    }]);
</script>
@endsection