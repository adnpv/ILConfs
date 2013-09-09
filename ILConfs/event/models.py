from django.db import models

# Create your models here.
class Event(models.Model):
	name = models.CharField(max_length=200)
	description = models.TextField()
	start_date = models.DateField('initial date')
	likes = models.IntegerField()

	'''class Meta:
		verbose_name = _('Event')
		verbose_name_plural = _('Events')'''

	def __unicode__(self):
		#para identificar en las partes de definiciones el nombre
		return self.name
	