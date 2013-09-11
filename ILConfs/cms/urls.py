from django.conf.urls import patterns, include, url
#from event.views import HelloTemplate#agregar el class view! desde nuestras vistas
urlpatterns= patterns('',
	url(r'^$','cms.views.home'),
	
	url(r'^uhome/$','cms.views.uhome'),
	url(r'^newacc/$','cms.views.crear_cuenta'),
	url(r'^newev/$','cms.views.crear_evento'),
	url(r'^contact/$','cms.views.contact'),

	url(r'^interact/$','cms.views.interacc'),
	url(r'^eventosh/$','cms.views.mis_eventos'),
	url(r'^serv/$','cms.views.servicio'),
	
	url(r'^login/$','cms.views.login'),
	url(r'^entradas/$','cms.views.mis_entradas'),
	url(r'^comprar/$','cms.views.comprar'),
	url(r'^get/(?P<event_ido>\d+)/$','cms.views.event'),

	#url(r'^language/(?P<language>[a-z\-]+)/$','event.views.language'),
)
