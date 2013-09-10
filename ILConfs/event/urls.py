from django.conf.urls import patterns, include, url
#from event.views import HelloTemplate#agregar el class view! desde nuestras vistas
urlpatterns= patterns('',
	url(r'^$','event.views.events'),
	url(r'^all/$','event.views.events'),
	url(r'^get/(?P<event_id>\d+)/$','event.views.event'),
	#url(r'^language/(?P<language>[a-z\-]+)/$','event.views.language'),
)
