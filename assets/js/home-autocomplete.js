(function(x){x('#auto-complete').typeahead({name:'typeahead',limit:4,dataType:'json',valueKey:'title',minLength:3,remote:{url:x('#auto-complete').data("url")+"/%QUERY"},template: _.template('<div class="media row animated fadeInDownBig"><a class="pull-left col-sm-2" href="#"><img class="media-object img-responsive" src="<%= poster %>" alt="..."></a><div class="media-body col-sm-8"><h4 class="media-heading"><%= title %></h4><p class="tt-plot"><%= plot %></p><p class="tt-genre"><%= genre %></p></div></div>')}).bind('typeahead:selected', function (obj, datum) {window.location.href = datum.link;})})( jQuery );