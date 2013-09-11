# Create your views here.
from django.http import HttpResponse

#from django.template.loader import get_template #ver carpeta templates
#from django.template import Context #paso datos(grupos)
	#se envio en el contexto, {{}} se pasara y render estos.

from django.shortcuts import render_to_response	
#clase!!
#from django.views.generic.base import TemplateView # sabe como mostrar un template.


from event.models import Event


def home(request):
	return render_to_response('home.html',
								{'events':Event.objects.all(),})#Filtrar los eventos destacados!!
def crear_cuenta(request):
	return redirect('uhome/')

def uhome(request):
	return render_to_response('local.html',
								{'events':Event.objects.all(),})#Filtrar los eventos destacados!!
# def event(request,event_id=1):
# 	return render_to_response('event.html',
# 								{'event':Event.objects.get(id=event_id),})



def events(request):
	return render_to_response('events.html',
								{'events':Event.objects.all(),})#agregar valor.
	#render_to_response(template,variables de contexto)
def event(request,event_id=1):
	return render_to_response('event.html',
								{'event':Event.objects.get(id=event_id),})


