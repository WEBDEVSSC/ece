<?php

namespace Database\Seeders;

use App\Models\CatClue;
use App\Models\Clue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $clues = [
            [ 'clues'=>'CLSSA000016', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO ABASOLO', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'ABASOLO' ],

            [ 'clues'=>'CLSSA000021', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO CONGREGACIÓN RODRÍGUEZ', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'LOS RODRIGUEZ' ],

            [ 'clues'=>'CLSSA000033', 'nombre'=>'HOSPITAL GENERAL CD. ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],

            [ 'clues'=>'CLSSA000045', 'nombre'=>'UNIDAD MÓVIL ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],

            [ 'clues'=>'CLSSA000050', 'nombre'=>'HOSPITAL GENERAL ALLENDE', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'ALLENDE' ],

            [ 'clues'=>'CLSSA000062', 'nombre'=>'URBANO DE 02 NÚCLEOS BÁSICOS ARTEAGA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'ARTEAGA' ],

            [ 'clues'=>'CLSSA000074', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO HUACHICHIL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'HUACHICHIL (EL HUACHE)' ],

            [ 'clues'=>'CLSSA000086', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO LOS LIRIOS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'LOS LIRIOS' ],

            [ 'clues'=>'CLSSA000091', 'nombre'=>'RUR. DE 02 NUC. BAS. SAN ANTONIO DE LAS ALAZANAS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SAN ANTONIO DE LAS ALAZANAS' ],

            [ 'clues'=>'CLSSA000103', 'nombre'=>'UNIDAD MÓVIL SAN ANTONIO DE LAS ALAZANAS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SAN ANTONIO DE LAS ALAZANAS' ],

            [ 'clues'=>'CLSSA000115', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO EL TUNAL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'EL TUNAL' ],

            [ 'clues'=>'CLSSA000120', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO CANDELA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'CANDELA' ],

            [ 'clues'=>'CLSSA000132', 'nombre'=>'UNIDAD MÓVIL CANDELA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'CANDELA' ],

            [ 'clues'=>'CLSSA000144', 'nombre'=>'UNIDAD MÓVIL CASTAÑOS', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'CASTAÑOS' ],

            [ 'clues'=>'CLSSA000156', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO CASTAÑOS', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'CASTAÑOS' ],

            [ 'clues'=>'CLSSA000161', 'nombre'=>'HOSPITAL GENERAL CUATRO CIÉNEGAS', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'CUATRO CIENEGAS DE CARRANZA' ],

            [ 'clues'=>'CLSSA000173', 'nombre'=>'RUR.DE 01 NÚCLEO BAS.ESTANQUE DE PALOMAS', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'ESTANQUE DE PALOMAS (LAS PALOMAS)' ],

            [ 'clues'=>'CLSSA000185', 'nombre'=>'UNIDAD MÓVIL ESTANQUE DE PALOMAS', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'ESTANQUE DE PALOMAS (LAS PALOMAS)' ],

            [ 'clues'=>'CLSSA000190', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO EL VENADO', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'EL VENADO' ],

            [ 'clues'=>'CLSSA000202', 'nombre'=>'UNIDAD MÓVIL EL VENADO', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'EL VENADO' ],

            [ 'clues'=>'CLSSA000214', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO ESCOBEDO', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'ESCOBEDO' ],

            [ 'clues'=>'CLSSA000226', 'nombre'=>'RURAL DE 01 NÚCLEO EJ.PRIMERO DE MAYO', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'PRIMERO DE MAYO' ],

            [ 'clues'=>'CLSSA000231', 'nombre'=>'HOSPITAL INTEGRAL FCO. I. MADERO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'FRANCISCO I. MADERO  ' ],

            [ 'clues'=>'CLSSA000243', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEOS BÁSICOS BATOPILAS', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'BATOPILAS' ],

            [ 'clues'=>'CLSSA000255', 'nombre'=>'UNIDAD MÓVIL BATOPILAS', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'BATOPILAS' ],

            [ 'clues'=>'CLSSA000260', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO CORUÑA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'LA CORUÑA' ],

            [ 'clues'=>'CLSSA000272', 'nombre'=>'CASA DE SALUD CHARCOS DE RISA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'CHARCOS DE RISA' ],

            [ 'clues'=>'CLSSA000284', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NÚCLEOS BÁSICOS LEQUEITIO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'LEQUEITIO' ],

            [ 'clues'=>'CLSSA000296', 'nombre'=>'RURAL DE 01 NÚCLEOS BÁSICOS LA PINTA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'LA PINTA' ],

            [ 'clues'=>'CLSSA000301', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NUC. BAS. SAN JOSÉ DE LA NIÑA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN JOSE DE LA NIÑA' ],

            [ 'clues'=>'CLSSA000313', 'nombre'=>'UNIDAD MÓVIL FRONTERA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'FRONTERA' ],

            [ 'clues'=>'CLSSA000325', 'nombre'=>'URBANO DE 02 NÚCLEOS BÁSICOS COL. BORJA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'FRONTERA' ],

            [ 'clues'=>'CLSSA000330', 'nombre'=>'URBANO DE 02 NÚCLEOS BÁSICOS OCCIDENTAL', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'FRONTERA' ],

            [ 'clues'=>'CLSSA000342', 'nombre'=>'URBANO DE 02 NÚCLEOS BÁSICOS CEFARE', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'FRONTERA' ],

            [ 'clues'=>'CLSSA000354', 'nombre'=>'CENTRO DE SALUD CON SERVICIOS AMPLIADOS GENERAL CEPEDA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'GENERAL CEPEDA' ],

            [ 'clues'=>'CLSSA000366', 'nombre'=>'UNIDAD MÓVIL# 37 GENERAL CEPEDA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'GENERAL CEPEDA' ],

            [ 'clues'=>'CLSSA000371', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO LA ROSA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'LA ROSA' ],

            [ 'clues'=>'CLSSA000383', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO GUERRERO', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'GUERRERO' ],

            [ 'clues'=>'CLSSA000395', 'nombre'=>'UNIDAD MÓVIL SAN VICENTE', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'SAN VICENTE' ],

            [ 'clues'=>'CLSSA000400', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO HIDALGO', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'HIDALGO' ],

            [ 'clues'=>'CLSSA000412', 'nombre'=>'CENTRO DE SALUD URBANO DE O1 NÚCLEO BÁSICO JIMÉNEZ', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'JIMENEZ' ],

            [ 'clues'=>'CLSSA000424', 'nombre'=>'UNIDAD MÓVIL JIMÉNEZ', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'JIMENEZ' ],

            [ 'clues'=>'CLSSA000436', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO PALMIRA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'PALMIRA (VICTORIA)' ],

            [ 'clues'=>'CLSSA000441', 'nombre'=>'RURAL DE 01 NÚCLEOS BÁSICOS SAN CARLOS', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'SAN CARLOS' ],

            [ 'clues'=>'CLSSA000453', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO JUÁREZ', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'JUAREZ' ],

            [ 'clues'=>'CLSSA000465', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NÚCLEOS BÁSICOS LAMADRID', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'LAMADRID' ],

            [ 'clues'=>'CLSSA000470', 'nombre'=>'HOSPITAL INTEGRAL MATAMOROS', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'MATAMOROS' ],

            [ 'clues'=>'CLSSA000482', 'nombre'=>'URBANO DE 02 NÚCLEOS BÁSICOS COYOTE', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'SAN ANTONIO DEL COYOTE' ],

            [ 'clues'=>'CLSSA000494', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO LA LUZ', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'LA LUZ' ],

            [ 'clues'=>'CLSSA000506', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO EL PILAR', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'EL PILAR' ],

            [ 'clues'=>'CLSSA000511', 'nombre'=>'RUR.DE 02 NÚCLEOS BAS. SANTO NIÑO AGUANAVAL', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'SANTO NIÑO AGUANAVAL' ],

            [ 'clues'=>'CLSSA000523', 'nombre'=>'UNIDAD MÓVIL SANTO NIÑO AGUANAVAL', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'SANTO NIÑO AGUANAVAL' ],

            [ 'clues'=>'CLSSA000535', 'nombre'=>'RURAL DE 01 NÚCLEOS BÁSICOS SOLIMA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'SOLIMA' ],

            [ 'clues'=>'CLSSA000540', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEOS BÁSICOS EL CAMBIO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'EL CAMBIO' ],

            [ 'clues'=>'CLSSA000552', 'nombre'=>'RURAL DE 02 NÚCLEOS BÁSICOS CONGREGACIÓN HIDALGO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'HIDALGO' ],

            [ 'clues'=>'CLSSA000564', 'nombre'=>'CLÍNICA DE ESPECIALIDADES (CRI) MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA000576', 'nombre'=>'CENTRO SI MUJER MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA000581', 'nombre'=>'CENTRO DE SALUD URBANO GUADALUPE DE MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA000593', 'nombre'=>'URBANO DE 02 NÚCLEOS BAS. LEANDRO VALLE', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA000605', 'nombre'=>'URBANO DE 02 NÚCLEOS BAS. INDEPENDENCIA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA000610', 'nombre'=>'URBANO DE 03 NÚCLEOS BÁSICOS SAN MIGUEL', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA000622', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NUCLEOS BASICO PURISIMA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA000634', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NÚCLEOS BÁSICOS MORELOS', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'MORELOS' ],

            [ 'clues'=>'CLSSA000646', 'nombre'=>'UNIDAD MÓVIL MORELOS', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'MORELOS' ],

            [ 'clues'=>'CLSSA000651', 'nombre'=>'CENTRO DE SALUD URBANO DE 5 NÚCLEOS BÁSICOS MÚZQUIZ', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'CIUDAD MELCHOR MUZQUIZ' ],

            [ 'clues'=>'CLSSA000663', 'nombre'=>'UNIDAD MÓVIL MÚZQUIZ', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'CIUDAD MELCHOR MUZQUIZ' ],

            [ 'clues'=>'CLSSA000675', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO MINAS DE BARROTERÀN', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'MINAS DE BARROTERAN' ],

            [ 'clues'=>'CLSSA000680', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO PALAÚ', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'PALAU' ],

            [ 'clues'=>'CLSSA000692', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO NADADORES', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'NADADORES' ],

            [ 'clues'=>'CLSSA000704', 'nombre'=>'CENTRO DE SALUD URBANO DE 04 NÚCLEOS BÁSICOS NAVA', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'NAVA' ],

            [ 'clues'=>'CLSSA000716', 'nombre'=>'UNIDAD MÓVIL NAVA', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'NAVA' ],

            [ 'clues'=>'CLSSA000721', 'nombre'=>'CENTRO DE SALUD URBANO DE 03 NÚCLEOS BÁSICOS OCAMPO', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'OCAMPO' ],

            [ 'clues'=>'CLSSA000733', 'nombre'=>'CASA DE SALUD ACEBUCHES', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'ACEBUCHES' ],

            [ 'clues'=>'CLSSA000745', 'nombre'=>'RUR. DE 01 NUC. BAS. BOQUILLAS DEL CARMEN', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'BOQUILLAS DEL CARMEN' ],

            [ 'clues'=>'CLSSA000750', 'nombre'=>'UNIDAD MÓVIL BOQUILLAS DEL CARMEN', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'BOQUILLAS DEL CARMEN' ],

            [ 'clues'=>'CLSSA000762', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO LA ROSITA', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'LA ROSITA' ],

            [ 'clues'=>'CLSSA000774', 'nombre'=>'UNIDAD MÓVIL LA ROSITA', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'LA ROSITA' ],

            [ 'clues'=>'CLSSA000786', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO SAN MIGUEL', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'SAN MIGUEL' ],

            [ 'clues'=>'CLSSA000791', 'nombre'=>'UNIDAD MÓVIL SAN MIGUEL', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'SAN MIGUEL' ],

            [ 'clues'=>'CLSSA000803', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEO BÁSICO CHULAVISTA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'CHULA VISTA' ],

            [ 'clues'=>'CLSSA000815', 'nombre'=>'HOSPITAL INTEGRAL PARRAS DE LA FUENTE', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'PARRAS DE LA FUENTE' ],

            [ 'clues'=>'CLSSA000820', 'nombre'=>'CLÍNICA DE ESPECIALIDADES (CRI) PARRAS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'PARRAS DE LA FUENTE' ],

            [ 'clues'=>'CLSSA000832', 'nombre'=>'HOSPITAL PSIQUIÁTRICO PARRAS DE LA FUENTE', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'PARRAS DE LA FUENTE' ],

            [ 'clues'=>'CLSSA000844', 'nombre'=>'UNIDAD MÓVIL #29 SAN JOSÉ PATAGALANA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'PARRAS DE LA FUENTE' ],

            [ 'clues'=>'CLSSA000856', 'nombre'=>'UNIDAD MÓVIL # 36 PARRAS DE LA FUENTE', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'PARRAS DE LA FUENTE' ],

            [ 'clues'=>'CLSSA000861', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO SABANILLAS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'NUEVO SABANILLA (SABANILLA)' ],

            [ 'clues'=>'CLSSA000873', 'nombre'=>'RURAL DE 01 NUC. BAS. SAN JOSÉ PATAGALANA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SAN JOSE DE PATAGALANA' ],

            [ 'clues'=>'CLSSA000885', 'nombre'=>'UNIDAD MÓVIL # 16 SAN FCO. DEL PROGRESO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SAN JOSE DE PATAGALANA' ],

            [ 'clues'=>'CLSSA000890', 'nombre'=>'CLÍNICA DE ESPECIALIDADES (CRI)', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA000902', 'nombre'=>'CENTRO SI MUJER PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA000914', 'nombre'=>'CENTRO DE SALUD URBANO DE 03 NÚCLEOS MUNDO NUEVO DE PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA000926', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO COL. BUENOS AIRES', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA000931', 'nombre'=>'URB. DE 01 NÚCLEO BAS. COL. LÁZARO CÁRDENAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA000943', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO EJ. PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA000955', 'nombre'=>'UNIDAD MÓVIL EJIDO PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA000960', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO PROGRESO', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'PROGRESO' ],

            [ 'clues'=>'CLSSA000972', 'nombre'=>'RURAL DE 01 NÚCLEOS BÁSICOS SAN JOSÉ DE AURA', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'SAN JOSE DE AURA' ],

            [ 'clues'=>'CLSSA000984', 'nombre'=>'UNIDAD MÓVIL# 17 RAMOS ARIZPE', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'RAMOS ARIZPE' ],

            [ 'clues'=>'CLSSA000996', 'nombre'=>'URBANO DE 04 NUC. BÁSICOS RAMOS ARIZPE', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'RAMOS ARIZPE' ],

            [ 'clues'=>'CLSSA001001', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO FRAUSTRO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'FRAUSTRO' ],

            [ 'clues'=>'CLSSA001013', 'nombre'=>'UNIDAD MÓVIL FRAUSTRO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'FRAUSTRO' ],

            [ 'clues'=>'CLSSA001025', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO HIPÓLITO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'HIPOLITO' ],

            [ 'clues'=>'CLSSA001030', 'nombre'=>'RURAL DE 02 NÚCLEOS BÁSICOS PAREDÓN', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'PAREDON' ],

            [ 'clues'=>'CLSSA001042', 'nombre'=>'CENTRO DE SALUD CON HOSPITAL SABINAS', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'SABINAS' ],

            [ 'clues'=>'CLSSA001054', 'nombre'=>'UNIDAD MÓVIL SABINAS', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'SABINAS' ],

            [ 'clues'=>'CLSSA001066', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO CLOETE', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'CLOETE' ],

            [ 'clues'=>'CLSSA001071', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO AGUJITA', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'AGUJITA' ],

            [ 'clues'=>'CLSSA001083', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO SACRAMENTO', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'SACRAMENTO' ],

            [ 'clues'=>'CLSSA001095', 'nombre'=>'CENTRO SI MUJER SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001100', 'nombre'=>'CLÍNICA DE ESPECIALIDADES (CREE)', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001112', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO CENTRO DE SALUD FUNDADORES', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001124', 'nombre'=>'CENTRO DE SALUD URBANO MADERO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001136', 'nombre'=>'HOSPITAL DEL NIÑO DR. FEDERICO GÓMEZ SANTOS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001141', 'nombre'=>'CENTRO ESTATAL DE SALUD MENTAL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001153', 'nombre'=>'UNIDAD MÓVIL # 39 SALTILLO (GÓMEZ FARIAS)', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001165', 'nombre'=>'UM NO. 39', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001170', 'nombre'=>'UNIDAD MÓVIL# 38 SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001182', 'nombre'=>'UNIDAD MÓVIL # 40 SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001194', 'nombre'=>'UNIDAD MÓVIL#44 SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001206', 'nombre'=>'CIRUGÍA AMBULATORIA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001211', 'nombre'=>'DENTAL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001223', 'nombre'=>'UNIDAD DE SERVICIOS INTEGRALES DE LA MUJER', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001235', 'nombre'=>'SALUD MENTAL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001240', 'nombre'=>'DIAGNOSTICO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001252', 'nombre'=>'URB. DE 02 NÚCLEOS BÁSICO NVA. JERUSALEM', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001264', 'nombre'=>'URBANO DE 04 NÚCLEOS BÁSICOS COL. ASTURIAS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001276', 'nombre'=>'URBANO DE 03 NÚCLEOS BÁSICOS COL. GIRASOL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001281', 'nombre'=>'URBANO DE 03 NÚCLEOS BÁSICOS AMPLIACIÓN MORELOS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001293', 'nombre'=>'URBANO DE 03 NÚCLEOS BÁSICOS SATÉLITE', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001305', 'nombre'=>'URBANO DE 09 NÚCLEOS BAS. LOS GONZÁLEZ', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA001310', 'nombre'=>'CASA DE SALUD CUAUTLA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'CUAUTLA' ],

            [ 'clues'=>'CLSSA001322', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO DERRAMADERO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'EL DERRAMADERO' ],

            [ 'clues'=>'CLSSA001334', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO GÓMEZ FARIAS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'GOMEZ FARIAS' ],

            [ 'clues'=>'CLSSA001346', 'nombre'=>'RURAL DE 01 NUC. BÁSICO SAN JUAN DE LA VAQUERÍA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SAN JUAN DE LA VAQUERIA' ],

            [ 'clues'=>'CLSSA001351', 'nombre'=>'RURAL DE 01 NUC. BÁSICO SAN JUAN DEL RETIRO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SAN JUAN DEL RETIRO' ],

            [ 'clues'=>'CLSSA001363', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO LA VENTURA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'LA VENTURA' ],

            [ 'clues'=>'CLSSA001375', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO SAN BUENAVENTURA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'SAN BUENAVENTURA' ],

            [ 'clues'=>'CLSSA001380', 'nombre'=>'UNIDAD MÓVIL SAN BUENAVENTURA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'SAN BUENAVENTURA' ],

            [ 'clues'=>'CLSSA001392', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO SAN JUAN DE SABINAS', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'SAN JUAN DE SABINAS' ],

            [ 'clues'=>'CLSSA001404', 'nombre'=>'HOSPITAL GENERAL NUEVA ROSITA', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'NUEVA ROSITA' ],

            [ 'clues'=>'CLSSA001416', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO SANTA MARÍA', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'SANTA MARIA' ],

            [ 'clues'=>'CLSSA001421', 'nombre'=>'HOSPITAL GENERAL SAN PEDRO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN PEDRO' ],

            [ 'clues'=>'CLSSA001433', 'nombre'=>'UNIDAD MÓVIL SAN PEDRO (SAN ANTONIO DE G)', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN PEDRO' ],

            [ 'clues'=>'CLSSA001445', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEO BÁSICO ALBIA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'EMILIANO ZAPATA (ALBIA)' ],

            [ 'clues'=>'CLSSA001450', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NÚCLEOS BÁSICOS LA ROSITA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'CONCORDIA (LA ROSITA)' ],

            [ 'clues'=>'CLSSA001462', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEO BÁSICO BEGOÑA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'GABINO VAZQUEZ (BEGOÑA)' ],

            [ 'clues'=>'CLSSA001474', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NÚCLEOS BÁSICOS LUCHANA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'LUCHANA' ],

            [ 'clues'=>'CLSSA001486', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEOS BÁSICOS MAYRÁN', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'MAYRAN' ],

            [ 'clues'=>'CLSSA001491', 'nombre'=>'UNIDAD MÓVIL MAYRÁN', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'MAYRAN' ],

            [ 'clues'=>'CLSSA001503', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEO BÁSICO EL RETIRO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'EL RETIRO' ],

            [ 'clues'=>'CLSSA001515', 'nombre'=>'RURAL DE 02 NÚCLEOS BÁSICOS SAN IGNACIO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN IGNACIO' ],

            [ 'clues'=>'CLSSA001520', 'nombre'=>'UNIDAD MÓVIL SAN IGNACIO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN IGNACIO' ],

            [ 'clues'=>'CLSSA001532', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEOS BÁSICO SAN LORENZO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN LORENZO' ],

            [ 'clues'=>'CLSSA001544', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEO BÁSICO SAN MARCOS', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN MARCOS' ],

            [ 'clues'=>'CLSSA001556', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEO BÁSICO SOFÍA DE ARRIBA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SOFIA DE ARRIBA' ],

            [ 'clues'=>'CLSSA001561', 'nombre'=>'CASA DE SALUD NUEVA VICTORIA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'NUEVA VICTORIA' ],

            [ 'clues'=>'CLSSA001573', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO SIERRA MOJADA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SIERRA MOJADA' ],

            [ 'clues'=>'CLSSA001585', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NÚCLEO BÁSICO ESMERALDA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'LA ESMERALDA' ],

            [ 'clues'=>'CLSSA001590', 'nombre'=>'CENTRO SI MUJER TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001602', 'nombre'=>'CLÍNICA DE ESPECIALIDADES (CRI) TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001614', 'nombre'=>'HOSPITAL GENERAL TORREÓN ( BAJA )', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001626', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO AQUILES SERDÁN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001631', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO BRAULIO FERNÁNDEZ AGUIRRE', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001643', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO COMPRESORA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001655', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO CAROLINAS', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001660', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO DIV. DEL NORTE', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001672', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO SAN ANTONIO DE LOS BRAVOS', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001684', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO SAN JOAQUÍN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001696', 'nombre'=>'URBANO DE 01 NÚCLEO BÁSICO LAS LUISAS', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001701', 'nombre'=>'URBANO DE 06 NÚCLEOS BÁSICOS ABASTOS', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001713', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NÚCLEOS BÁSICOS LA CONCHA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'LA CONCHA' ],

            [ 'clues'=>'CLSSA001725', 'nombre'=>'UNIDAD MÓVIL LA CONCHA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'LA CONCHA' ],

            [ 'clues'=>'CLSSA001730', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO LA FLOR DE JIMULCO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'LA FLOR DE JIMULCO' ],

            [ 'clues'=>'CLSSA001742', 'nombre'=>'UNIDAD MÓVIL LA FLOR DE JIMULCO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'LA FLOR DE JIMULCO' ],

            [ 'clues'=>'CLSSA001754', 'nombre'=>'RURAL DE 01 NÚCLEOS BÁSICOS JUAN EUGENIO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'JUAN EUGENIO' ],

            [ 'clues'=>'CLSSA001766', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO LA PARTIDA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'LA PARTIDA' ],

            [ 'clues'=>'CLSSA001771', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NÚCLEO BÁSICO VIESCA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'VIESCA' ],

            [ 'clues'=>'CLSSA001783', 'nombre'=>'UNIDAD MÓVIL VIESCA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'VIESCA' ],

            [ 'clues'=>'CLSSA001795', 'nombre'=>'RURAL DE 01 NUC. BÁSICO EMILIANO ZAPATA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'EMILIANO ZAPATA' ],

            [ 'clues'=>'CLSSA001800', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO SAN JOSÉ DEL AGUAJE', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'SAN JOSE DEL AGUAJE' ],

            [ 'clues'=>'CLSSA001812', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO LA VENTANA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'LA VENTANA' ],

            [ 'clues'=>'CLSSA001824', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO VILLA UNIÓN', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'VILLA UNION' ],

            [ 'clues'=>'CLSSA001836', 'nombre'=>'UNIDAD MÓVIL VILLA UNIÓN', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'VILLA UNION' ],

            [ 'clues'=>'CLSSA001841', 'nombre'=>'CENTRO DE SALUD URBANO ZARAGOZA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'ZARAGOZA' ],

            [ 'clues'=>'CLSSA001853', 'nombre'=>'UNIDAD MÓVIL ZARAGOZA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'ZARAGOZA' ],

            [ 'clues'=>'CLSSA001865', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO SANTA EULALIA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'SANTA EULALIA' ],

            [ 'clues'=>'CLSSA001870', 'nombre'=>'CENTRO DE SALUD URBANO DE 02 NÚCLEOS BÁSICOS VILLA DE FUENTE', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA001882', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NUC. BAS. COL. LÁZARO CÁRDENAS', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN PEDRO' ],

            [ 'clues'=>'CLSSA001894', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NUC. BAS. COL. MIGUEL HIDALGO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN PEDRO' ],

            [ 'clues'=>'CLSSA001906', 'nombre'=>'UNIDAD MÉDICA DE OPORTUNIDADES', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA001911', 'nombre'=>'UNIDAD MÉDICA DE OPORTUNIDADES TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001923', 'nombre'=>'UNIDAD MÉDICA DE OPORTUNIDADES FRANCISCO I. MADERO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'FRANCISCO I. MADERO  ' ],

            [ 'clues'=>'CLSSA001935', 'nombre'=>'UNIDAD MÉDICA DE OPORTUNIDADES SAN PEDRO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN PEDRO' ],

            [ 'clues'=>'CLSSA001940', 'nombre'=>'CENTRO DE SALUD URBANO DE 01 NÚCLEO BÁSICO LA JOYA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA001952', 'nombre'=>'UNIDAD MÓVIL LA JOYA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'LA ESPERANZA' ],

            [ 'clues'=>'CLSSA001964', 'nombre'=>'URBANO DE 02 NÚCLEOS BÁSICOS COL. PRADERAS', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA001970', 'nombre'=>'OFICINA JURISDICCIONAL PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA001982', 'nombre'=>'OFICINA DE LA JURISDICCION SANITARIA Nº 2 ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],

            [ 'clues'=>'CLSSA001994', 'nombre'=>'OFICINA JURISDICCIONAL SABINAS', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'SABINAS' ],

            [ 'clues'=>'CLSSA002006', 'nombre'=>'OFICINA JURISDICCIONAL MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA002011', 'nombre'=>'OFICINA JURISDICCIONAL CUATROCIÉNEGAS', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'CUATRO CIENEGAS DE CARRANZA' ],

            [ 'clues'=>'CLSSA002023', 'nombre'=>'OFICINA JURISDICCIONAL TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002035', 'nombre'=>'OFICINA JURISDICCIONAL FRANCISCO I. MADERO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'FRANCISCO I. MADERO  ' ],

            [ 'clues'=>'CLSSA002040', 'nombre'=>'OFICINA DE LA JURISDICCION SANITARIA Nº 8 SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002052', 'nombre'=>'LABORATORIO ESTATAL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002064', 'nombre'=>'ALMACÉN ESTATAL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002076', 'nombre'=>'TRANSFUSIÓN SANGUÍNEA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002081', 'nombre'=>'CREE', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002093', 'nombre'=>'JEFATURA ESTATAL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002105', 'nombre'=>'CENTRO ANTIRRÁBICO SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002110', 'nombre'=>'CENTRO ANTIRRÁBICO PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],

            [ 'clues'=>'CLSSA002122', 'nombre'=>'CENTRO ANTIRRÁBICO ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],

            [ 'clues'=>'CLSSA002134', 'nombre'=>'CENTRO ANTIRRÁBICO MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA002146', 'nombre'=>'CENTRO ANTIRRÁBICO TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002151', 'nombre'=>'CENTRO ANTIRRÁBICO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'FRANCISCO I. MADERO  ' ],

            [ 'clues'=>'CLSSA002163', 'nombre'=>'CEN. DE INF. EN SALUD INTEGRAL', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002175', 'nombre'=>'URBANO DE 02 NÚCLEO BÁSICO MONCLOVA ORIENTE', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA002180', 'nombre'=>'MÓDULO DEL ADOLESCENTE DE MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],

            [ 'clues'=>'CLSSA002192', 'nombre'=>'CENTRO ESTATAL DE ATENCIÓN AL ADULTO MAYOR', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002203', 'nombre'=>'UNEME CAPASITS TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002215', 'nombre'=>'UNEME CAPASITS SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002220', 'nombre'=>'MÓDULO DEL HOSPITAL UNIVERSITARIO TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002232', 'nombre'=>'MÓDULO MILITAR DE PLANIFICACIÓN FAMILIAR TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002244', 'nombre'=>'MÓDULO DE LA DIRECCIÓN DE SALUD MUNICIPAL', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002256', 'nombre'=>'RURAL DE 01 NUCLEO BASICO JALISCO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'JALISCO' ],

            [ 'clues'=>'CLSSA002261', 'nombre'=>'CENTRO DE ATENCIÓN DE METALES', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002273', 'nombre'=>'MODULO DE ATENCIÓN TACUBAYA', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'TACUBAYA' ],

            [ 'clues'=>'CLSSA002285', 'nombre'=>'CARAVANA SABINAS', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'CIUDAD MELCHOR MUZQUIZ' ],

            [ 'clues'=>'CLSSA002290', 'nombre'=>'CARAVANA CASTAÑOS', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'CASTAÑOS' ],

            [ 'clues'=>'CLSSA002302', 'nombre'=>'CARAVANA ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],

            [ 'clues'=>'CLSSA002314', 'nombre'=>'CARAVANA OCAMPO', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'CUATRO CIENEGAS DE CARRANZA [ESTACION]' ],

            [ 'clues'=>'CLSSA002326', 'nombre'=>'CASA DE SALUD ARTESILLAS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'ARTESILLAS' ],

            [ 'clues'=>'CLSSA002331', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO, BELLA UNIÓN', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'EL ALAMBRE' ],

            [ 'clues'=>'CLSSA002343', 'nombre'=>'CENTRO DE SALUD URBANO HÉRCULES', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'HERCULES' ],

            [ 'clues'=>'CLSSA002355', 'nombre'=>'CENTRO COMUNITARIO DE SALUD MENTAL Y ADICCIONES SAN PEDRO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN PEDRO' ],

            [ 'clues'=>'CLSSA002360', 'nombre'=>'RURAL DE 01 NÚCLEO BÁSICO, LA CRUZ', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'LA CRUZ' ],

            [ 'clues'=>'CLSSA002372', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA SALTILLO CENTRO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],

            [ 'clues'=>'CLSSA002384', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA TORREÓN CENTRO HIDALGO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002396', 'nombre'=>'UNIDAD MÓVIL# 36 PARRAS DE LA FUENTE (CARAVANA)', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'PARRAS DE LA FUENTE' ],

            [ 'clues'=>'CLSSA002401', 'nombre'=>'CARAVANA CAÑÓN DE JAMÉ', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'ARTEAGA' ],

            [ 'clues'=>'CLSSA002413', 'nombre'=>'CARAVANA GENERAL CEPEDA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'GENERAL CEPEDA' ],

            [ 'clues'=>'CLSSA002425', 'nombre'=>'CARAVANA SABANILLAS', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'PARRAS DE LA FUENTE' ],

            [ 'clues'=>'CLSSA002430', 'nombre'=>'CARAVANA CONGREGACIÓN HIDALGO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'MATAMOROS' ],

            [ 'clues'=>'CLSSA002442', 'nombre'=>'CENTRO SI MUJER CUATROCIÉNEGAS', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'CUATRO CIENEGAS DE CARRANZA' ],

            [ 'clues'=>'CLSSA002454', 'nombre'=>'CENTRO DE SALUD INTEGRAL DE LA MUJER NUEVA ROSITA', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'NUEVA ROSITA' ],

            [ 'clues'=>'CLSSA002466', 'nombre'=>'HOSPITAL GENERAL MUZQUIZ', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'PALAU' ],

            [ 'clues'=>'CLSSA002471', 'nombre'=>'CISAME TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],

            [ 'clues'=>'CLSSA002483', 'nombre'=>'CENTRO COMUNITARIO DE SALUD MENTAL Y ADICCIONES TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],
            [ 'clues'=>'CLSSA002495', 'nombre'=>'UNEME CRÓNICAS TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],
            [ 'clues'=>'CLSSA002500', 'nombre'=>'CENTRO COMUNITARIO DE SALUD MENTAL Y ADICCIONES NUEVA ROSITA', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'NUEVA ROSITA' ],
            [ 'clues'=>'CLSSA002512', 'nombre'=>'UNEME CAPASITS PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],
            [ 'clues'=>'CLSSA002524', 'nombre'=>'CENTRO COMUNITARIO DE SALUD MENTAL Y ADICCIONES PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],
            [ 'clues'=>'CLSSA002536', 'nombre'=>'UNEME CRÓNICAS PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],
            [ 'clues'=>'CLSSA002541', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],
            [ 'clues'=>'CLSSA002553', 'nombre'=>'CENTRO COMUNITARIO DE SALUD MENTAL Y ADICCIONES ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],
            [ 'clues'=>'CLSSA002565', 'nombre'=>'CONSULTORIO PERIFÉRICO PIEDRAS NEGRAS', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],
            [ 'clues'=>'CLSSA002570', 'nombre'=>'CENTRO COMUNITARIO DE SALUD MENTAL Y ADICCIONES MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],
            [ 'clues'=>'CLSSA002582', 'nombre'=>'CENTRO COMUNITARIO DE SALUD MENTAL Y ADICCIONES SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002594', 'nombre'=>'UNEME CRÓNICAS SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002606', 'nombre'=>'CARAVANA SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002611', 'nombre'=>'CARAVANA SAN PEDRO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'SAN PEDRO' ],
            [ 'clues'=>'CLSSA002623', 'nombre'=>'CONSULTORIO PERIFÉRICO SABINAS', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'SABINAS' ],
            [ 'clues'=>'CLSSA002635', 'nombre'=>'CONSULTORIO PERIFÉRICO NUEVA ROSITA', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'NUEVA ROSITA' ],
            [ 'clues'=>'CLSSA002640', 'nombre'=>'INSTITUTO DE SERVICIOS DE SALUD, REHABILITACIÓN Y EDUCACIÓN ESPECIAL E INTEGRAL DEL ESTADO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002652', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA SALTILLO REPUBLICA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002664', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA SALTILLO GUAYULERA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002676', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA RAMOS ARIZPE', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'RAMOS ARIZPE' ],
            [ 'clues'=>'CLSSA002681', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],
            [ 'clues'=>'CLSSA002693', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA MUZQUIZ', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'CIUDAD MELCHOR MUZQUIZ' ],
            [ 'clues'=>'CLSSA002705', 'nombre'=>'CONSULTORIO DE MEGAFARMACIA TORREÓN CENTRO GALEANA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],
            [ 'clues'=>'CLSSA002710', 'nombre'=>'HOSPITAL GENERAL MONCLOVA AMPARO PAPE DE BENAVIDES', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],
            [ 'clues'=>'CLSSA002722', 'nombre'=>'CENTRO DE SALUD RURAL DE 01 NUCLEO BÁSICO, SARDINAS', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'NUEVO POBLADO DE SARDINAS' ],
            [ 'clues'=>'CLSSA002734', 'nombre'=>'HOSPITAL GENERAL DE SALTILLO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002746', 'nombre'=>'UNEME CRONICAS ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],
            [ 'clues'=>'CLSSA002751', 'nombre'=>'UNEME CAPASITS ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],
            [ 'clues'=>'CLSSA002763', 'nombre'=>'HOSPITAL GENERAL PIEDRAS NEGRAS DR SALVADOR CHAVARRIA SANCHEZ.', 'jurisdiccion'=>'1', 'jurisdiccion_label'=>'PIEDRAS NEGRAS', 'municipio'=>'PIEDRAS NEGRAS' ],
            [ 'clues'=>'CLSSA002775', 'nombre'=>'CENTRO DE SALUD RURAL EL PALMAR', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002780', 'nombre'=>'CENTRO COMUNITARIO DE SALUD MENTAL Y ADICCIONES MATAMOROS', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'MATAMOROS' ],
            [ 'clues'=>'CLSSA002792', 'nombre'=>'CENTRO DE SALUD RURAL SACRAMENTO', 'jurisdiccion'=>'5', 'jurisdiccion_label'=>'CUATRO CIENEGAS', 'municipio'=>'SACRAMENTO' ],
            [ 'clues'=>'CLSSA002804', 'nombre'=>'CENTRO SI MUJER FCO. I. MADERO', 'jurisdiccion'=>'7', 'jurisdiccion_label'=>'FRANCISCO I. MADERO', 'municipio'=>'FRANCISCO I. MADERO  ' ],
            [ 'clues'=>'CLSSA002816', 'nombre'=>'UNEME CRÓNICAS NUEVA ROSITA', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'NUEVA ROSITA' ],
            [ 'clues'=>'CLSSA002821', 'nombre'=>'UNEME CRÓNICAS MONCLOVA', 'jurisdiccion'=>'4', 'jurisdiccion_label'=>'MONCLOVA', 'municipio'=>'MONCLOVA' ],
            [ 'clues'=>'CLSSA002833', 'nombre'=>'CARAVANA VIESCA', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'VIESCA' ],
            [ 'clues'=>'CLSSA002845', 'nombre'=>'UNIDAD DE CONSULTA EXTERNA TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],
            [ 'clues'=>'CLSSA002850', 'nombre'=>'UNIDAD MÓVIL ROSA ESTATAL PARA CANCER DE MAMA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002862', 'nombre'=>'HOSPITAL GENERAL TORREÓN', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'TORREON' ],
            [ 'clues'=>'CLSSA002871', 'nombre'=>'CENTRO DE SALUD INTEGRAL DE LA MUJER CIUDAD ACUÑA', 'jurisdiccion'=>'2', 'jurisdiccion_label'=>'ACUÑA', 'municipio'=>'CIUDAD ACUÑA' ],
            [ 'clues'=>'CLSSA002880', 'nombre'=>'COMISIÓN COAHUILENSE DE CONCILIACIÓN Y ARBITRAJE MÉDICO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002895', 'nombre'=>'CENTRO REGIONAL DE DESARROLLO INFANTIL (CEREDI NUEVA ROSITA)', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'NUEVA ROSITA' ],
            [ 'clues'=>'CLSSA002903', 'nombre'=>'CLINICA SANTA ELENA', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002915', 'nombre'=>'UNIDAD AUXILIAR DE SALUD JIMULCO', 'jurisdiccion'=>'6', 'jurisdiccion_label'=>'TORREÓN', 'municipio'=>'JIMULCO' ],
            [ 'clues'=>'CLSSA002920', 'nombre'=>'CENTRO DE SALUD RURAL MARGARITA GONZALEZ (COMUNIDAD NEGROS MASCOGOS)', 'jurisdiccion'=>'3', 'jurisdiccion_label'=>'SABINAS', 'municipio'=>'NEGROS MASKOGOS (NACIMIENTO)' ],
            [ 'clues'=>'CLSSA002932', 'nombre'=>'CENTRO ONCOLOGICO DE LA REGION SURESTE "SALVADOR CHAVARRIA DELGADO', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ],
            [ 'clues'=>'CLSSA002944', 'nombre'=>'SERVICIO AMIGABLE ITINERANTE EDUSEX', 'jurisdiccion'=>'8', 'jurisdiccion_label'=>'SALTILLO', 'municipio'=>'SALTILLO' ]
        ];

        foreach ($clues as $clue) {
            CatClue::create($clue);
        }

        $this->command->info('CLUES insertados correctamente.');
    }
}
