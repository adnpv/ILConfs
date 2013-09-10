from django.conf.urls import patterns, include, url
#from event.views import HelloTemplate#agregar el class view! desde nuestras vistas
urlpatterns= patterns('',
	url(r'^$','cms.views.home'),
	url(r'^login/$','cms.views.login'),
	url(r'^entradas/$','cms.views.mis_entradas'),
	url(r'^comprar/$','cms.views.comprar'),
	url(r'^newacc/$','cms.views.crear_cuenta'),
	url(r'^get/(?P<event_id>\d+)/$','cms.views.event'),
	#url(r'^language/(?P<language>[a-z\-]+)/$','event.views.language'),
)
