class Porcentaje:
    def __init__(self, total, porcentaje=0):
        self.total = total
        self.porcentaje = porcentaje

    def calcular(self):
        return float(self.total * self.porcentaje / 100)


class Planilla:
    def __init__(self, nombre, sexo, civil, edad, hijos=0):
        self.nombre = nombre.upper()
        self.sexo = sexo.upper()
        self.civil = civil.upper()
        self.hijos = hijos
        self.edad = edad
        self.sueldo_base = self.__definir_sueldo()

    def __str__(self):
        return f"Trabajador: {self.nombre} \nsexo: {self.sexo} " \
               f"\nestado civil: {self.civil} \nedad: {self.edad} \nhijos: {self.hijos} " \
               f"\nsueldo base: {self.sueldo_base} \nAporte afp: {self.aporte_afp()} " \
               f"\naporte essalud: {self.aporte_essalud()} \naporte especial: {self.aporte_especial()}" \
               f"\naporte total: {self.total_aporte()} \nbonificacion 1: {self.bonificacion1()} " \
               f"\nbonificacion 2: {self.bonificacion2()} \nbonificacion 3: {self.bonificacion3()} " \
               f"\ntotal bonificacion {self.total_bonificacion()} \nsueldo neto: {self.sueldo_neto()}".upper()

    def __definir_sueldo(self):
        if self.sexo == "M":
            return 5000
        return 4000

    def __definir_porcentaje_afp(self):
        if self.civil == "SOLTERO" or self.civil == "SOLTERA":
            return 15
        if self.civil == "CASADO" or self.civil == "CASADA":
            return 10
        if self.civil == "DIVORCIADO" or self.civil == "DIVORCIADA":
            return 5
        return 0

    def aporte_afp(self):
        return Porcentaje(self.sueldo_base, self.__definir_porcentaje_afp()).calcular()

    def __definir_porcentaje_essalud(self):
        if self.hijos != 0:
            return 10
        return 5

    def aporte_essalud(self):
        return Porcentaje(self.sueldo_base, self.__definir_porcentaje_essalud()).calcular()

    def aporte_especial(self):
        return Porcentaje(self.sueldo_base, 10).calcular()

    def total_aporte(self):
        return self.aporte_afp() + self.aporte_especial() + self.aporte_essalud()

    def __bonificacion1(self):
        if self.sexo == "F" and self.hijos != 0:
            return 20

    def __bonificacion2(self):
        if self.sexo == "M" and self.hijos != 0 and self.civil == "CASADO":
            return 20

    def __bonificacion3(self):
        if 21 <= self.edad <= 30:
            return 10
        if 41 <= self.edad <= 50:
            return 20

    def bonificacion1(self):
        if not self.__bonificacion1():
            return "no elegible"
        num = Porcentaje(self.sueldo_base, self.__bonificacion1())
        return num.calcular()

    def bonificacion2(self):
        if not self.__bonificacion2():
            return "no elegible"
        num = Porcentaje(self.sueldo_base, self.__bonificacion2())
        return num.calcular()

    def bonificacion3(self):
        if not self.__bonificacion3():
            return "no elegible"
        num = Porcentaje(self.sueldo_base, self.__bonificacion3())
        return num.calcular()

    def total_bonificacion(self):
        bono1 = self.bonificacion1() if self.bonificacion1() != "no elegible" else 0
        bono2 = self.bonificacion2() if self.bonificacion2() != "no elegible" else 0
        bono3 = self.bonificacion3() if self.bonificacion3() != "no elegible" else 0
        return bono1 + bono2 + bono3

    def sueldo_neto(self):
        return (self.sueldo_base + self.total_bonificacion()) - self.total_aporte()


# input_nombre = input("Ingrese nombre del trabajador → ")
# input_sexo = input("Ingrese sexo (m/f) → ")
# input_civil = input("Ingrese estado civil → ")
# input_edad = int(input("Ingrese edad → "))
# input_hijos = int(input("Ingrese cantidad de hijos → "))
#
# Planilla(input_nombre, input_sexo, input_civil, input_edad, input_hijos).mostrar_sueldo()

obj = Planilla(nombre="Armando Casas", sexo="F", civil="soltero", edad=50, hijos=3)
print(obj)