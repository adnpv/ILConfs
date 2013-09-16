from django.conf.urls import patterns, include, url
#from event.views import HelloTemplate#agregar el class view! desde nuestras vistas
urlpatterns= patterns('',
	url(r'^$','djangoapps.event.views.events'),
	url(r'^all/$','djangoapps.event.views.events'),
	url(r'^get/(?P<event_id>\d+)/$','djangoapps.event.views.event'),
	#url(r'^language/(?P<language>[a-z\-]+)/$','event.views.language'),
)
