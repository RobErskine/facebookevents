# Introduction
Plugin for CraftCMS that imports events from a Facebook page

# Required Settings

- Facebook App ID
- Facebook Secret
- Facebook Page Name

# Use

The events will be accessible in your template files using `craft.facebookEvents.events`.

## Example HTML

Note that the example HTML only makes use of the first event in the array. However, all the events are available if needed.

```
{% set events = craft.facebookEvents.events %}
{% set item = events['data'][0] %}
{% if item.description is defined %}
<div class="row pad45">
  <div class="col-lg-12">
    <h5 class="label"><i class="fa fa-calendar"></i>{{item.name}}</h5>
    {% set timezone = 'America/Chicago' %}
    {% if item.event_times is defined %}
      {% for event in item.event_times %}
        <h2 class="dark">{{event.start_time|date("m/d/Y g:i a", timezone)}} - {{event.end_time|date("g:i a", timezone)}}</h2>
      {% endfor %}
    {% else %}
        <h2 class="dark">{{item.start_time|date("m/d/Y g:i a", timezone)}} - {{item.end_time|date("g:i a", timezone)}}</h2>
    {% endif %}
    <p class="home">{{item.description}}</p>
    <div class="arrow-container" style="text-align: left;">
      <a href="https://facebook.com/events/{{item.id}}" target="_blank" class="arrow-link">Learn More &rarr;</a>
    </div>
  </div>
</div
<hr>
{% else %}
<h2 class="dark">No Upcoming Events</h2>
{% endif %}
</div>
```
