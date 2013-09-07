from django.db import models

# Create your models here.

Class Usuario (models.Model):
	idusuario = models.AutoField(primary_key=True)
	apepat = models.CharField(max_length=30) 
	apemat = models.CharField(max_length=30) 
	nombres = models.CharField(max_length=60) 
	dni = models.CharField(max_length=8, unique=True) 
	rol = models.CharField(max_length=15)
	correo = models.CharField(max_length=60)
	direccion = models.CharField(max_length=100)
	distrito = models.CharField(max_length=100)
	usuario = models.CharField(max_length=10) 
	contrasena = models.CharField(max_length=40)