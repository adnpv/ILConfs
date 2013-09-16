from django.contrib import admin 
from djangoapps.event.models import Event
	#nuestra app.

admin.site.register(Event)#registrar clase en el sistema de admin.