from django.conf.urls import patterns, include, url
#from event.views import HelloTemplate#agregar el class view! desde nuestras vistas
urlpatterns= patterns('djangoapps.event.views',
	url(r'^$','events'),
	url(r'^all/$','events'),
	url(r'^get/(?P<event_id>\d+)/$','event'),
	url(r'^jsonev/$','jsonevent'),
    url(r'^jsonev2/$','jsonevent2'),
    url(r'^creaevpago/$','crear_evento_pago'),
    url(r'^pagocrea/$','pagar_creacion'),
    url(r'^evento_creado/$','evento_creado'),
	#url(r'^language/(?P<language>[a-z\-]+)/$','event.views.language'),
)
