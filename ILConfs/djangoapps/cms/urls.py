from django.conf.urls import patterns, include, url
#from event.views import HelloTemplate#agregar el class view! desde nuestras vistas
urlpatterns= patterns('',
	url(r'^$','djangoapps.cms.views.home'),
	
	url(r'^uhome/$','djangoapps.cms.views.uhome'),
	url(r'^newacc/$','djangoapps.cms.views.crear_cuenta'),
	url(r'^newev/$','djangoapps.cms.views.crear_evento'),
	url(r'^contact/$','djangoapps.cms.views.contact'),

	url(r'^interact/(?P<event_id>\d+)/$','djangoapps.cms.views.interacc'),
	url(r'^eventosh/$','djangoapps.cms.views.mis_eventos'),
	url(r'^serv/$','djangoapps.cms.views.servicio'),
	
	url(r'^login/$','djangoapps.cms.views.login'),
	url(r'^entradas/$','djangoapps.cms.views.mis_entradas'),
	url(r'^comprar/$','djangoapps.cms.views.comprar'),
	url(r'^get/(?P<event_id>\d+)/$','djangoapps.cms.views.event'),

	#url(r'^language/(?P<language>[a-z\-]+)/$','event.views.language'),
)
