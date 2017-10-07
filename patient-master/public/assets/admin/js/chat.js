var chat = {
    Class: null,
    posstion: {
        x: 10,
        y: 10
    },
    GetClass: function () {
        return $("."+chat.Class);
    },
    append: function () {
        SetPositions();
    },
    push: function () {
        var id = chat.GetClass();
        if(id != "" || id != 'undefined'){
            chat.append();
        }else {
            console.error("element must be defined as ID");
        }
    }
}

function ShowChat() {
    CreateCookie("chatbox",true,365);
    var mini = $("#mini-chat");
    var view = $("#chat-pannel");
    mini.hide();
    view.fadeIn(300);

    var messageWrraperHeight = $(".messages-wrapper").height();
    $(".chat-body").animate({scrollTop: messageWrraperHeight}, "slow");
}

function CloseChat() {
    EraseCookie("chatbox");
    var mini = $("#mini-chat");
    var view = $("#chat-pannel");
    view.fadeOut(300);
    mini.show();
}


function SetPositions() {
    var id = chat.GetClass();
    var mini = id.find("#mini-chat");
    mini.css({
        bottom: chat.posstion.x,
        right: chat.posstion.y
    });
}

/**
 * dom event functions
 */

$("#mini-chat").click(function () {
    ShowChat();
});

$("#close-chat").click(function () {
    CloseChat();
});

$(document).ready(function () {
    var checkcookie = ReadCookie("chatbox");
    if (checkcookie == 'true'){
        ShowChat();
    }else {
        CloseChat();
    }
});


/**
 * Basic functions for handling cookies
 */

function CreateCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function ReadCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function EraseCookie(name) {
    CreateCookie(name, "", -1);
}