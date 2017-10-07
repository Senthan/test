@if(isset($eventType) && $eventType->readonly == 'Yes')
    {{ form()->bsText('name', null, null, ['readonly' => true]) }}
@else
    {{ form()->bsText('name') }}
@endif
{{ form()->bsSelect('class', null, $classes, null, ['class' => 'form-control']) }}