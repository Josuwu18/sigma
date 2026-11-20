<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PensumSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // 1. Tipos de Materia (ENUM exacto: 'Teórica', 'Práctica', 'Laboratorio')
        $tipos = ['Teórica', 'Práctica', 'Laboratorio'];
        $tipoIds = [];
        foreach ($tipos as $nombreTipo) {
            DB::table('tipo_materia')->updateOrInsert(
                ['nombre' => $nombreTipo],
                ['estatus' => 1, 'created_at' => $now, 'updated_at' => $now]
            );
            $tipoIds[$nombreTipo] = DB::table('tipo_materia')->where('nombre', $nombreTipo)->value('id');
        }

        // 2. Semestres (1ro al 9no)
        $semestres = [
            1 => '1er Semestre',
            2 => '2do Semestre',
            3 => '3er Semestre',
            4 => '4to Semestre',
            5 => '5to Semestre',
            6 => '6to Semestre',
            7 => '7mo Semestre',
            8 => '8vo Semestre',
            9 => '9no Semestre',
        ];
        $semestreIds = [];
        foreach ($semestres as $num => $nombreSem) {
            DB::table('semestres')->updateOrInsert(
                ['nombre' => $nombreSem],
                ['estatus' => 1, 'created_at' => $now, 'updated_at' => $now]
            );
            $semestreIds[$num] = DB::table('semestres')->where('nombre', $nombreSem)->value('id');
        }

        // 3. Carreras
        $carreras = [
            'AGM' => 'LICENCIATURA EN ADMINISTRACIÓN Y GESTIÓN MUNICIPAL',
            'ELN' => 'INGENIERÍA ELECTRÓNICA',
            'SYC' => 'INGENIERÍA DE SISTEMAS',
            'TLC' => 'INGENIERÍA DE TELECOMUNICACIONES',
            'MEC' => 'INGENIERÍA MECÁNICA',
        ];
        $carreraIds = [];
        foreach ($carreras as $cod => $nombreCar) {
            DB::table('carreras')->updateOrInsert(
                ['codigo' => $cod],
                ['nombre' => $nombreCar, 'estatus' => 1, 'created_at' => $now, 'updated_at' => $now]
            );
            $carreraIds[$cod] = DB::table('carreras')->where('codigo', $cod)->value('id');
        }

        // 4. Catálogo General de Materias [codigo => [nombre, uc, tipo]]
        $materias = [
            // --- CICLO BÁSICO COMÚN INGENIERÍAS ---
            'ADG-25132' => ['EDUCACIÓN AMBIENTAL', 2, 'Teórica'],
            'ADG-25123' => ['HOMBRE, SOCIEDAD, CIENCIA Y TECNOLOGÍA', 3, 'Teórica'],
            'IDM-24113' => ['INGLÉS I', 3, 'Teórica'],
            'MAT-21212' => ['DIBUJO', 2, 'Práctica'],
            'MAT-21215' => ['MATEMÁTICA I', 5, 'Teórica'],
            'MAT-21524' => ['GEOMETRÍA ANALÍTICA', 4, 'Teórica'],
            'ADG-21131' => ['SEMINARIO I', 1, 'Práctica'],
            'ADG-25131' => ['SEMINARIO I (TELECOM)', 1, 'Práctica'],
            'DIN-21113' => ['DEFENSA INTEGRAL DE LA NACIÓN I', 3, 'Práctica'],
            'IDM-24123' => ['INGLÉS II', 3, 'Teórica'],
            'QUF-22014' => ['QUÍMICA GENERAL', 4, 'Laboratorio'],
            'QUF-23015' => ['FÍSICA I', 5, 'Laboratorio'],
            'MAT-21225' => ['MATEMÁTICA II', 5, 'Teórica'],
            'MAT-21114' => ['ÁLGEBRA LINEAL', 4, 'Teórica'],
            'ADG-21141' => ['SEMINARIO II', 1, 'Práctica'],
            'ADG-25141' => ['SEMINARIO II (TELECOM)', 1, 'Práctica'],
            'DIN-21123' => ['DEFENSA INTEGRAL DE LA NACIÓN II', 3, 'Práctica'],
            'ADO-10101' => ['ACTIVIDAD COMPLEMENTARIA I', 0, 'Práctica'],
            'QUF-23025' => ['FÍSICA II', 5, 'Laboratorio'],
            'MAT-21235' => ['MATEMÁTICA III', 5, 'Teórica'],
            'MAT-21414' => ['PROBABILIDADES Y ESTADÍSTICA', 4, 'Teórica'],
            'SYC-22113' => ['PROGRAMACIÓN', 3, 'Práctica'],
            'MAT-20254' => ['TRANSFORMADAS INTEGRALES', 4, 'Teórica'],
            'MAT-21224' => ['TRANSFORMADAS INTEGRALES (TELECOM)', 4, 'Teórica'],
            'DIN-21133' => ['DEFENSA INTEGRAL DE LA NACIÓN III', 3, 'Práctica'],
            'DIN-31143' => ['DEFENSA INTEGRAL DE LA NACIÓN IV', 3, 'Práctica'],
            'ADO-10102' => ['ACTIVIDAD COMPLEMENTARIA II', 0, 'Práctica'],
            'DIN-31153' => ['DEFENSA INTEGRAL DE LA NACIÓN V', 3, 'Práctica'],
            'ADG-10820' => ['CÁTEDRA BOLIVARIANA I', 0, 'Teórica'],
            'ADO-10103' => ['ACTIVIDAD COMPLEMENTARIA III', 0, 'Práctica'],
            'ADG-10821' => ['CÁTEDRA BOLIVARIANA II', 0, 'Teórica'],
            'TAI-01'    => ['TALLER DE INDUCCIÓN DEL SERVICIO COMUNITARIO', 0, 'Práctica'],
            'CJU-37314' => ['MARCO LEGAL PARA EL EJERCICIO DE LA INGENIERÍA', 4, 'Teórica'],
            'DIN-31163' => ['DEFENSA INTEGRAL DE LA NACIÓN VI', 3, 'Práctica'],
            'ADG-30214' => ['METODOLOGÍA DE LA INVESTIGACIÓN', 4, 'Teórica'],
            'DIN-31173' => ['DEFENSA INTEGRAL DE LA NACIÓN VII', 3, 'Práctica'],
            'PRO-01'    => ['PROYECTO DE SERVICIO COMUNITARIO', 0, 'Práctica'],
            'DIN-31183' => ['DEFENSA INTEGRAL DE LA NACIÓN VIII', 3, 'Práctica'],
            'ADO-10104' => ['ACTIVIDAD COMPLEMENTARIA IV', 0, 'Práctica'],
            'TGR-30010' => ['TRABAJO ESPECIAL DE GRADO', 10, 'Práctica'],
            'PSI-30010' => ['PASANTÍAS', 10, 'Práctica'],

            // Electivas genéricas y actividades sin código explícito en planilla
            'ELEC-TEC-1' => ['ELECTIVA TÉCNICA I', 3, 'Teórica'],
            'ELEC-TEC-2' => ['ELECTIVA TÉCNICA II', 3, 'Teórica'],
            'ELEC-NOT-1' => ['ELECTIVA NO TÉCNICA I', 3, 'Teórica'],
            'ELEC-NOT-2' => ['ELECTIVA NO TÉCNICA II', 3, 'Teórica'],
            'ELEC-AGM-1' => ['ELECTIVA I', 3, 'Teórica'],
            'ELEC-AGM-2' => ['ELECTIVA II', 3, 'Teórica'],
            'ELEC-AGM-3' => ['ELECTIVA III', 3, 'Teórica'],
            'INSMIL-01'  => ['INSTRUCCIÓN MILITAR I', 0, 'Práctica'],
            'INSMIL-02'  => ['INSTRUCCIÓN MILITAR II', 0, 'Práctica'],
            'INSMIL-03'  => ['INSTRUCCIÓN MILITAR III', 0, 'Práctica'],
            'INSMIL-04'  => ['INSTRUCCIÓN MILITAR IV', 0, 'Práctica'],
            'INSMIL-05'  => ['INSTRUCCIÓN MILITAR V', 0, 'Práctica'],
            'INSMIL-06'  => ['INSTRUCCIÓN MILITAR VI', 0, 'Práctica'],
            'INSMIL-07'  => ['INSTRUCCIÓN MILITAR VII', 0, 'Práctica'],
            'INSMIL-08'  => ['INSTRUCCIÓN MILITAR VIII', 0, 'Práctica'],

            // --- ING. SISTEMAS ---
            'AGG-22313' => ['SISTEMAS ADMINISTRATIVOS', 4, 'Teórica'],
            'MAT-31714' => ['CÁLCULO NUMÉRICO', 4, 'Teórica'],
            'MAT-31214' => ['LÓGICA MATEMÁTICA', 4, 'Teórica'],
            'SYC-32225' => ['LENGUAJES DE PROGRAMACIÓN I', 5, 'Práctica'],
            'SYC-32414' => ['PROCESAMIENTO DE DATOS', 4, 'Práctica'],
            'AGL-30214' => ['SISTEMAS DE PRODUCCIÓN', 4, 'Teórica'],
            'SYC-32114' => ['TEORÍA DE LOS SISTEMAS', 4, 'Teórica'],
            'MAT-31114' => ['TEORÍA DE GRAFOS', 4, 'Teórica'],
            'SYC-32235' => ['LENGUAJES DE PROGRAMACIÓN II', 5, 'Práctica'],
            'MAT-30925' => ['INVESTIGACIÓN DE OPERACIONES', 5, 'Teórica'],
            'ELN-30514' => ['CIRCUITOS LÓGICOS', 4, 'Laboratorio'],
            'SYC-32514' => ['ANÁLISIS DE SISTEMAS', 4, 'Teórica'],
            'SYC-32614' => ['BASES DE DATOS', 4, 'Práctica'],
            'MAT-30935' => ['OPTIMIZACIÓN NO LINEAL', 5, 'Teórica'],
            'SYC-32245' => ['LENGUAJES DE PROGRAMACIÓN III', 5, 'Práctica'],
            'MAT-31414' => ['PROCESOS ESTOCÁSTICOS', 4, 'Teórica'],
            'SYC-30525' => ['ARQUITECTURA DEL COMPUTADOR', 5, 'Teórica'],
            'SYC-32524' => ['DISEÑO DE SISTEMAS', 4, 'Práctica'],
            'SYC-30834' => ['SISTEMAS OPERATIVOS', 4, 'Práctica'],
            'SYC-32714' => ['IMPLANTACIÓN DE SISTEMAS', 4, 'Práctica'],
            'MAT-30945' => ['SIMULACIÓN Y MODELOS', 5, 'Práctica'],
            'SYC-31644' => ['REDES', 4, 'Laboratorio'],
            'ADG-30224' => ['GERENCIA DE LA INFORMÁTICA', 4, 'Teórica'],
            'MAT-31314' => ['TEORÍA DE DECISIONES', 4, 'Teórica'],
            'SYC-32814' => ['AUDITORÍA DE SISTEMAS', 4, 'Teórica'],
            'TTC-31154' => ['TELEPROCESOS', 4, 'Teórica'],

            // --- ING. ELECTRÓNICA ---
            'ELC-30114' => ['REDES ELÉCTRICAS I', 4, 'Laboratorio'],
            'QUF-33035' => ['FÍSICA III', 5, 'Laboratorio'],
            'ELN-33154' => ['SEÑALES Y SISTEMAS DINÁMICOS', 4, 'Teórica'],
            'ELC-30215' => ['MEDICIONES ELÉCTRICAS', 5, 'Laboratorio'],
            'ELN-31325' => ['SISTEMAS DIGITALES I', 5, 'Laboratorio'],
            'ELN-30314' => ['TEORÍA ELECTROMAGNÉTICA', 4, 'Teórica'],
            'ELC-30125' => ['REDES ELÉCTRICAS II', 5, 'Laboratorio'],
            'ELN-30115' => ['ELECTRÓNICA I', 5, 'Laboratorio'],
            'ELN-31335' => ['SISTEMAS DIGITALES II', 5, 'Laboratorio'],
            'ELN-33155' => ['TEORÍA DE CONTROL AUTOMÁTICO', 5, 'Teórica'],
            'ELN-34105' => ['PROGRAMACIÓN ORIENTADA A OBJETOS', 5, 'Práctica'],
            'ELC-32105' => ['CONVERSIÓN ELECTROMECÁNICA', 5, 'Laboratorio'],
            'ELN-33415' => ['INSTRUMENTACIÓN INDUSTRIAL', 5, 'Laboratorio'],
            'ELN-33205' => ['CONTROL DE PROCESOS', 5, 'Laboratorio'],
            'ELN-31415' => ['MICROPROCESADORES', 5, 'Laboratorio'],
            'ELN-30125' => ['ELECTRÓNICA II', 5, 'Laboratorio'],
            'ELC-32415' => ['CONTROL DE MOTORES', 5, 'Laboratorio'],
            'TLC-31145' => ['COMUNICACIONES', 5, 'Laboratorio'],
            'ELN-30135' => ['ELECTRÓNICA III', 5, 'Laboratorio'],
            'ELN-33215' => ['SISTEMAS DE CONTROL', 5, 'Laboratorio'],
            'ELN-33324' => ['AUTOMATIZACIÓN Y CONTROL INDUSTRIAL', 4, 'Laboratorio'],
            'ELN-31315' => ['ELECTRÓNICA INDUSTRIAL', 5, 'Laboratorio'],
            'AGM-30314' => ['MANTENIMIENTO GENERAL', 4, 'Teórica'],
            'ELN-33301' => ['SEMINARIO DE CONTROL', 1, 'Práctica'],

            // --- ING. DE TELECOMUNICACIONES ---
            'TLC-31115' => ['REDES ELÉCTRICAS I (TELECOM)', 5, 'Laboratorio'],
            'ELN-35135' => ['SEÑALES Y SISTEMAS', 5, 'Teórica'],
            'QUF-33013' => ['FÍSICA III (TELECOM)', 3, 'Teórica'],
            'ELN-35114' => ['TEORÍA ELECTROMAGNÉTICA (TELECOM)', 4, 'Teórica'],
            'AGL-35410' => ['SEMINARIO DE TELECOMUNICACIONES I', 3, 'Práctica'],
            'TLC-31125' => ['REDES ELÉCTRICAS II (TELECOM)', 5, 'Laboratorio'],
            'TLC-31225' => ['ELECTRÓNICA I (TELECOM)', 5, 'Laboratorio'],
            'TLC-32125' => ['SISTEMAS DIGITALES', 5, 'Laboratorio'],
            'TLC-35215' => ['COMUNICACIONES I', 5, 'Laboratorio'],
            'TLC-35314' => ['LÍNEAS DE TRANSMISIÓN', 4, 'Teórica'],
            'TLC-31235' => ['ELECTRÓNICA II (TELECOM)', 5, 'Laboratorio'],
            'ELN-32225' => ['MICROPROCESADORES (TELECOM)', 5, 'Laboratorio'],
            'TLC-35225' => ['COMUNICACIONES II', 5, 'Laboratorio'],
            'ELN-35325' => ['MICROONDAS', 5, 'Laboratorio'],
            'TLC-31514' => ['INSTRUMENTACIÓN DE LAS COMUNICACIONES', 4, 'Laboratorio'],
            'SYC-32315' => ['COMPUTACIÓN AVANZADA', 5, 'Práctica'],
            'TLC-31325' => ['ELECTRÓNICA DE LAS COMUNICACIONES', 5, 'Laboratorio'],
            'TLC-35414' => ['SISTEMAS DE COMUNICACIONES I', 4, 'Laboratorio'],
            'ELN-35344' => ['ANTENAS', 4, 'Laboratorio'],
            'ELN-35323' => ['COMUNICACIONES ÓPTICAS', 3, 'Teórica'],
            'TLC-35424' => ['SISTEMAS DE COMUNICACIONES II', 4, 'Laboratorio'],
            'TLC-35465' => ['REDES DE TELECOMUNICACIONES', 5, 'Laboratorio'],
            'AGL-35423' => ['SEMINARIO DE TELECOMUNICACIONES II', 3, 'Práctica'],
            'TLC-31323' => ['TRANSMISIÓN DE DATOS', 3, 'Teórica'],

            // --- ING. MECÁNICA ---
            'MAT-20814' => ['CÁLCULO NUMÉRICO (MEC)', 4, 'Teórica'],
            'MAT-30265' => ['MATEMÁTICAS APLICADAS A LA INGENIERÍA', 5, 'Teórica'],
            'MEC-30115' => ['MECÁNICA', 5, 'Teórica'],
            'QUF-30315' => ['TERMODINÁMICA I', 5, 'Teórica'],
            'MAT-30123' => ['GEOMETRÍA DESCRIPTIVA', 3, 'Práctica'],
            'SYC-30114' => ['INFORMÁTICA (MEC)', 4, 'Práctica'],
            'MEC-30314' => ['ELEMENTOS DE CIENCIAS DE LOS MATERIALES Y METALURGIA', 4, 'Laboratorio'],
            'QUF-30325' => ['TERMODINÁMICA II', 5, 'Teórica'],
            'ELC-30315' => ['ELECTROTECNIA', 5, 'Laboratorio'],
            'MEC-30215' => ['RESISTENCIA DE LOS MATERIALES', 5, 'Teórica'],
            'MEC-30414' => ['MECÁNICA DE LOS FLUIDOS', 4, 'Laboratorio'],
            'MEC-30124' => ['DIBUJO MECÁNICO', 4, 'Práctica'],
            'MEC-30614' => ['PROCESO DE FABRICACIÓN I', 4, 'Laboratorio'],
            'MEC-30134' => ['MECANISMOS', 4, 'Teórica'],
            'QUF-30514' => ['TRANSFERENCIA DE CALOR', 4, 'Teórica'],
            'SYC-30814' => ['SISTEMAS', 4, 'Teórica'],
            'MEC-30714' => ['DINÁMICA DE GASES', 4, 'Teórica'],
            'MEC-30625' => ['PROCESOS DE FABRICACIÓN II', 5, 'Laboratorio'],
            'MEC-30915' => ['VIBRACIONES MECÁNICAS', 5, 'Teórica'],
            'MEC-30815' => ['DISEÑO DE LOS ELEMENTOS DE MÁQUINAS I', 5, 'Práctica'],
            'AGP-30213' => ['HIGIENE Y SEGURIDAD INDUSTRIAL', 3, 'Teórica'],
            'AGM-30315' => ['MANTENIMIENTO GENERAL (MEC)', 5, 'Teórica'],
            'MEC-30825' => ['DISEÑO DE LOS ELEMENTOS DE MÁQUINAS II', 5, 'Práctica'],
            'MEC-31015' => ['TURBOMÁQUINAS', 5, 'Teórica'],
            'MEC-31115' => ['GENERACIÓN DE POTENCIA', 5, 'Teórica'],

            // --- LIC. ADMINISTRACIÓN Y GESTIÓN MUNICIPAL ---
            'ADG-34112' => ['TÉCNICAS DE ESTUDIO Y DOCUMENTACIÓN', 2, 'Teórica'],
            'SYC-32113' => ['INFORMÁTICA (AGM)', 3, 'Práctica'],
            'SOC-33113' => ['SOCIOLOGÍA', 3, 'Teórica'],
            'MAT-31114-AGM' => ['MATEMÁTICA', 4, 'Teórica'],
            'SOC-33312' => ['HISTORIA ECONÓMICA Y SOCIAL DE VENEZUELA', 2, 'Teórica'],
            'ADG-34213' => ['PRINCIPIOS DE ADMINISTRACIÓN', 3, 'Teórica'],
            'ARH-37113' => ['ADMINISTRACIÓN DE RECURSOS HUMANOS', 3, 'Teórica'],
            'MAT-31214-AGM' => ['ESTADÍSTICA I', 4, 'Teórica'],
            'CJU-35113' => ['DERECHO CONSTITUCIONAL', 3, 'Teórica'],
            'MAT-31343' => ['MICROECONOMÍA', 3, 'Teórica'],
            'SOC-33213' => ['PSICOLOGÍA GENERAL', 3, 'Teórica'],
            'ADG-34224' => ['ADMINISTRACIÓN PÚBLICA Y RELACIONES INTERGUBERNAMENTALES', 4, 'Teórica'],
            'MAT-31314-AGM' => ['CONTABILIDAD', 4, 'Práctica'],
            'MAT-31224' => ['ESTADÍSTICA II', 4, 'Teórica'],
            'MAT-31353' => ['MACROECONOMÍA', 3, 'Teórica'],
            'MAT-31233' => ['MATEMÁTICA FINANCIERA', 3, 'Práctica'],
            'SOC-33223' => ['PSICOLOGÍA SOCIAL Y COMUNITARIA', 3, 'Teórica'],
            'CJU-35123' => ['DERECHOS HUMANOS', 3, 'Teórica'],
            'MAT-31334' => ['FINANZAS', 4, 'Práctica'],
            'MAT-31324' => ['CONTABILIDAD PÚBLICA', 4, 'Práctica'],
            'CJU-35133' => ['DERECHO ADMINISTRATIVO Y ORDENAMIENTO TERRITORIAL', 3, 'Teórica'],
            'ADG-34123' => ['ORGANIZACIÓN Y MÉTODOS', 3, 'Teórica'],
            'ADG-34234' => ['PRESUPUESTO PÚBLICO', 4, 'Práctica'],
            'ARH-37133' => ['TRABAJO SOCIAL COMUNITARIO', 3, 'Práctica'],
            'CJU-35214' => ['LEGISLACIÓN LABORAL Y SEGURIDAD SOCIAL', 4, 'Teórica'],
            'AGL-36213' => ['PLANIFICACIÓN ESTRATÉGICA', 3, 'Teórica'],
            'CJU-35233' => ['LEGISLACIÓN FISCAL Y MERCANTIL', 3, 'Teórica'],
            'MAT-31364' => ['CONTABILIDAD DE COSTOS', 4, 'Práctica'],
            'CJU-35163' => ['FUNDAMENTOS DE DERECHO EN LA GESTIÓN MUNICIPAL', 3, 'Teórica'],
            'AGL-36133' => ['INICIATIVA EMPRESARIAL I', 3, 'Teórica'],
            'ADG-30213' => ['METODOLOGÍA DE LA INVESTIGACIÓN (AGM)', 3, 'Teórica'],
            'AGL-36113' => ['POLÍTICAS PÚBLICAS', 3, 'Teórica'],
            'ARH-37123' => ['COMPORTAMIENTO ORGANIZACIONAL', 3, 'Teórica'],
            'ADG-34243' => ['SERVICIOS PÚBLICOS Y GESTIÓN DE OBRAS', 3, 'Teórica'],
            'SYC-32133' => ['SISTEMAS DE INFORMACIÓN GERENCIAL', 3, 'Práctica'],
            'AGL-36143' => ['INICIATIVA EMPRESARIAL II', 3, 'Teórica'],
            'AGL-36163' => ['FORMULACIÓN Y EVALUACIÓN DE PROYECTOS SOCIALES', 3, 'Práctica'],
            'ARH-37213' => ['ÉTICA PROFESIONAL', 3, 'Teórica'],
            'ADG-34134' => ['ANÁLISIS Y GESTIÓN DE SISTEMAS RURALES Y URBANOS', 4, 'Teórica'],
            'AGL-36233' => ['TEORÍA DE LA TOMA DE DECISIONES', 3, 'Teórica'],
            'AGL-36224' => ['TEORÍA Y MANEJO DEL CONFLICTO', 4, 'Teórica'],
            'ADG-34143' => ['INVESTIGACIÓN SOCIAL', 3, 'Práctica'],
            'CJU-35173' => ['SEGURIDAD CIUDADANA', 3, 'Teórica'],
            'ADG-34253' => ['TÉCNICAS Y EQUIPOS DE NEGOCIACIÓN', 3, 'Práctica'],
            'AGL-36243' => ['GERENCIA BAJO CRISIS', 3, 'Teórica'],
        ];

        $materiaIds = [];
        foreach ($materias as $codigo => [$nombre, $uc, $tipoNombre]) {
            DB::table('materias')->updateOrInsert(
                ['codigo' => $codigo],
                [
                    'nombre' => $nombre,
                    'unidades_creditos' => $uc,
                    'id_tipo_materia' => $tipoIds[$tipoNombre],
                    'estatus' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
            $materiaIds[$codigo] = DB::table('materias')->where('codigo', $codigo)->value('id');
        }

        // 5. Pensums por Carrera: [carrera => [semestre => [codigo_materia, ...]]]
        $pensums = [
            // =========================================================================
            // INGENIERÍA DE SISTEMAS
            // =========================================================================
            'SYC' => [
                1 => ['ADG-25132', 'ADG-25123', 'IDM-24113', 'MAT-21212', 'MAT-21215', 'MAT-21524', 'ADG-21131', 'DIN-21113'],
                2 => ['IDM-24123', 'QUF-22014', 'QUF-23015', 'MAT-21225', 'MAT-21114', 'ADG-21141', 'DIN-21123', 'ADO-10101'],
                3 => ['QUF-23025', 'MAT-21235', 'MAT-21414', 'SYC-22113', 'AGG-22313', 'DIN-21133'],
                4 => ['MAT-31714', 'MAT-31214', 'SYC-32225', 'SYC-32414', 'AGL-30214', 'DIN-31143', 'ADO-10102', 'SYC-32114'],
                5 => ['MAT-31114', 'SYC-32235', 'MAT-30925', 'ELN-30514', 'SYC-32514', 'DIN-31153', 'ADG-10820', 'SYC-32614'],
                6 => ['MAT-30935', 'SYC-32245', 'MAT-31414', 'SYC-30525', 'SYC-32524', 'SYC-30834', 'ADG-10821', 'TAI-01', 'DIN-31163'],
                7 => ['SYC-32714', 'ADG-30214', 'MAT-30945', 'SYC-31644', 'ADG-30224', 'ELEC-TEC-1', 'ELEC-NOT-1', 'DIN-31173', 'PRO-01'],
                8 => ['MAT-31314', 'SYC-32814', 'TTC-31154', 'CJU-37314', 'ELEC-TEC-2', 'ELEC-NOT-2', 'DIN-31183', 'ADO-10104'],
                9 => ['TGR-30010'],
            ],

            // =========================================================================
            // INGENIERÍA ELECTRÓNICA
            // =========================================================================
            'ELN' => [
                1 => ['ADG-25132', 'ADG-25123', 'IDM-24113', 'MAT-21212', 'MAT-21215', 'MAT-21524', 'ADG-21131', 'DIN-21113'],
                2 => ['IDM-24123', 'QUF-22014', 'QUF-23015', 'MAT-21225', 'MAT-21114', 'ADG-21141', 'DIN-21123', 'ADO-10101'],
                3 => ['QUF-23025', 'MAT-21235', 'MAT-21414', 'SYC-22113', 'MAT-20254', 'DIN-21133'],
                4 => ['ELC-30114', 'QUF-33035', 'ELN-33154', 'ELC-30215', 'ELN-31325', 'ELN-30314', 'DIN-31143', 'ADO-10102'],
                5 => ['ELC-30125', 'ELN-30115', 'ELN-31335', 'ELN-33155', 'ELN-34105', 'DIN-31153', 'ADG-10820'],
                6 => ['ADO-10103', 'ELC-32105', 'ELN-33415', 'ELN-33205', 'ELN-31415', 'ELN-30125', 'ADG-10821', 'TAI-01', 'CJU-37314', 'DIN-31163'],
                7 => ['ELC-32415', 'TLC-31145', 'ELN-30135', 'ELN-33215', 'ADG-30214', 'ELEC-TEC-1', 'ELEC-NOT-1', 'DIN-31173', 'PRO-01'],
                8 => ['ELN-33324', 'ELN-31315', 'AGM-30314', 'ELN-33301', 'ELEC-TEC-2', 'ELEC-NOT-2', 'DIN-31183', 'ADO-10104'],
                9 => ['TGR-30010'],
            ],

            // =========================================================================
            // INGENIERÍA DE TELECOMUNICACIONES
            // =========================================================================
            'TLC' => [
                1 => ['ADG-25132', 'ADG-25123', 'IDM-24113', 'MAT-21212', 'MAT-21215', 'MAT-21524', 'ADG-25131', 'INSMIL-01', 'ADO-10101'],
                2 => ['IDM-24123', 'QUF-22014', 'QUF-23015', 'MAT-21225', 'MAT-21114', 'ADG-25141', 'INSMIL-02', 'ADO-10102'],
                3 => ['QUF-23025', 'MAT-21235', 'MAT-21414', 'SYC-22113', 'MAT-21224', 'INSMIL-03', 'ADO-10103', 'ADG-10820'],
                4 => ['TLC-31115', 'ELN-35135', 'QUF-33013', 'ELN-35114', 'CJU-37314', 'AGL-35410', 'ADG-10821', 'INSMIL-04', 'ADO-10104'],
                5 => ['TLC-31125', 'TLC-31225', 'TLC-32125', 'TLC-35215', 'TLC-35314', 'ELEC-NOT-1', 'INSMIL-05'],
                6 => ['TLC-31235', 'ELN-32225', 'TLC-35225', 'ELN-35325', 'TLC-31514', 'SYC-32315', 'INSMIL-06'],
                7 => ['TLC-31325', 'AGM-30314', 'TLC-35414', 'ELN-35344', 'ELN-35323', 'ADG-30214', 'ELEC-NOT-2', 'INSMIL-07'],
                8 => ['TLC-35424', 'TLC-35465', 'AGL-35423', 'TLC-31323', 'ELEC-TEC-1', 'ELEC-TEC-2', 'INSMIL-08'],
                9 => ['TGR-30010', 'PSI-30010'],
            ],

            // =========================================================================
            // INGENIERÍA MECÁNICA
            // =========================================================================
            'MEC' => [
                1 => ['ADG-25132', 'ADG-25123', 'IDM-24113', 'MAT-21212', 'MAT-21215', 'MAT-21524', 'ADG-21131', 'DIN-21113'],
                2 => ['IDM-24123', 'QUF-22014', 'QUF-23015', 'MAT-21225', 'MAT-21114', 'ADG-21141', 'DIN-21123', 'ADO-10101'],
                3 => ['QUF-23025', 'MAT-21235', 'MAT-21414', 'SYC-22113', 'MAT-20814', 'DIN-21133'],
                4 => ['MAT-30265', 'MEC-30115', 'QUF-30315', 'MAT-30123', 'SYC-30114', 'MEC-30314', 'DIN-31143', 'ADO-10102'],
                5 => ['QUF-30325', 'ELC-30315', 'MEC-30215', 'MEC-30414', 'MEC-30124', 'DIN-31153', 'ADG-10820', 'MEC-30614'],
                6 => ['MEC-30134', 'QUF-30514', 'SYC-30814', 'MEC-30714', 'MEC-30625', 'ADG-30214', 'ADG-10821', 'TAI-01', 'DIN-31163'],
                7 => ['MEC-30915', 'MEC-30815', 'AGP-30213', 'AGM-30315', 'ELEC-TEC-1', 'ELEC-NOT-1', 'DIN-31173', 'PRO-01'],
                8 => ['MEC-30825', 'MEC-31015', 'MEC-31115', 'CJU-37314', 'ELEC-TEC-2', 'ELEC-NOT-2', 'DIN-31183', 'ADO-10104'],
                9 => ['TGR-30010'],
            ],

            // =========================================================================
            // LICENCIATURA EN ADMINISTRACIÓN Y GESTIÓN MUNICIPAL
            // =========================================================================
            'AGM' => [
                1 => ['ADG-34112', 'SYC-32113', 'SOC-33113', 'MAT-31114-AGM', 'SOC-33312', 'ADG-34213', 'INSMIL-01', 'ADO-10101'],
                2 => ['ARH-37113', 'MAT-31214-AGM', 'CJU-35113', 'MAT-31343', 'SOC-33213', 'ADG-34224', 'INSMIL-02', 'ADO-10102'],
                3 => ['MAT-31314-AGM', 'MAT-31224', 'MAT-31353', 'MAT-31233', 'SOC-33223', 'CJU-35123', 'ADG-10820', 'INSMIL-03', 'ADO-10103'],
                4 => ['MAT-31334', 'MAT-31324', 'CJU-35133', 'ADG-34123', 'ADG-34234', 'ARH-37133', 'ADG-10821', 'INSMIL-04', 'ADO-10104'],
                5 => ['CJU-35214', 'AGL-36213', 'CJU-35233', 'MAT-31364', 'CJU-35163', 'AGL-36133', 'INSMIL-05'],
                6 => ['ADG-30213', 'AGL-36113', 'ARH-37123', 'ADG-34243', 'SYC-32133', 'AGL-36143', 'INSMIL-06'],
                7 => ['AGL-36163', 'ARH-37213', 'ADG-34134', 'AGL-36233', 'AGL-36224', 'ELEC-AGM-1', 'INSMIL-07'],
                8 => ['ADG-34143', 'CJU-35173', 'ADG-34253', 'AGL-36243', 'ELEC-AGM-2', 'ELEC-AGM-3', 'INSMIL-08'],
                9 => ['TGR-30010', 'PSI-30010'],
            ],
        ];

        foreach ($pensums as $codCarrera => $semestresCarrera) {
            $idCarrera = $carreraIds[$codCarrera];
            foreach ($semestresCarrera as $numSem => $codigosMaterias) {
                $idSemestre = $semestreIds[$numSem];
                foreach ($codigosMaterias as $codMat) {
                    $idMateria = $materiaIds[$codMat];
                    $uc = $materias[$codMat][1];

                    DB::table('pensums')->updateOrInsert(
                        [
                            'id_carrera' => $idCarrera,
                            'id_semestre' => $idSemestre,
                            'id_materia' => $idMateria,
                        ],
                        [
                            'unidades_credito' => $uc,
                            'estatus' => 1,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ]
                    );
                }
            }
        }

        // 6. Prelaciones por Carrera: [carrera => [[codigo_materia_prelada, codigo_materia_preladora], ...]]
        $prelaciones = [
            // --- ING. SISTEMAS ---
            'SYC' => [
                ['MAT-21215', 'MAT-21524'],
                ['ADG-21131', 'MAT-21215'],
                ['IDM-24123', 'IDM-24113'],
                ['QUF-23015', 'MAT-21215'],
                ['QUF-23015', 'MAT-21524'],
                ['MAT-21225', 'MAT-21215'],
                ['MAT-21225', 'MAT-21524'],
                ['MAT-21114', 'MAT-21215'],
                ['MAT-21114', 'MAT-21524'],
                ['ADG-21141', 'ADG-21131'],
                ['DIN-21123', 'DIN-21113'],
                ['QUF-23025', 'QUF-23015'],
                ['QUF-23025', 'MAT-21225'],
                ['MAT-21235', 'MAT-21225'],
                ['MAT-21414', 'MAT-21225'],
                ['SYC-22113', 'MAT-21114'],
                ['DIN-21133', 'DIN-21123'],
                ['MAT-31714', 'MAT-21235'],
                ['MAT-31214', 'MAT-21114'],
                ['SYC-32225', 'SYC-22113'],
                ['SYC-32414', 'SYC-22113'],
                ['AGL-30214', 'AGG-22313'],
                ['DIN-31143', 'DIN-21133'],
                ['ADO-10102', 'ADO-10101'],
                ['MAT-31114', 'MAT-31214'],
                ['MAT-31114', 'MAT-21414'],
                ['SYC-32235', 'SYC-32225'],
                ['MAT-30925', 'MAT-31714'],
                ['ELN-30514', 'MAT-31214'],
                ['SYC-32514', 'SYC-32114'],
                ['DIN-31153', 'DIN-31143'],
                ['SYC-32614', 'SYC-32114'],
                ['MAT-30935', 'MAT-30925'],
                ['SYC-32245', 'SYC-32235'],
                ['MAT-31414', 'MAT-30925'],
                ['MAT-31414', 'MAT-31114'],
                ['SYC-30525', 'ELN-30514'],
                ['SYC-32524', 'SYC-32514'],
                ['SYC-30834', 'SYC-30525'],
                ['ADG-10821', 'ADG-10820'],
                ['DIN-31163', 'DIN-31153'],
                ['SYC-32714', 'SYC-32524'],
                ['MAT-30945', 'MAT-30935'],
                ['MAT-30945', 'MAT-31414'],
                ['SYC-31644', 'SYC-30834'],
                ['DIN-31173', 'DIN-31163'],
                ['PRO-01',    'TAI-01'],
                ['MAT-31314', 'MAT-30945'],
                ['SYC-32814', 'SYC-32714'],
                ['TTC-31154', 'SYC-31644'],
                ['DIN-31183', 'DIN-31173'],
                ['ADO-10104', 'ADO-10103'],
            ],

            // --- ING. ELECTRÓNICA ---
            'ELN' => [
                ['MAT-21215', 'MAT-21524'],
                ['ADG-21131', 'MAT-21215'],
                ['IDM-24123', 'IDM-24113'],
                ['QUF-23015', 'MAT-21215'],
                ['QUF-23015', 'MAT-21524'],
                ['MAT-21225', 'MAT-21215'],
                ['MAT-21225', 'MAT-21524'],
                ['MAT-21114', 'MAT-21215'],
                ['MAT-21114', 'MAT-21524'],
                ['ADG-21141', 'ADG-21131'],
                ['DIN-21123', 'DIN-21113'],
                ['QUF-23025', 'QUF-23015'],
                ['QUF-23025', 'MAT-21225'],
                ['MAT-21235', 'MAT-21225'],
                ['MAT-21414', 'MAT-21225'],
                ['SYC-22113', 'MAT-21114'],
                ['MAT-20254', 'MAT-21235'],
                ['MAT-20254', 'MAT-21114'],
                ['DIN-21133', 'DIN-21123'],
                ['ELC-30114', 'MAT-20254'],
                ['ELC-30114', 'QUF-23025'],
                ['QUF-33035', 'MAT-21235'],
                ['QUF-33035', 'QUF-23025'],
                ['ELN-33154', 'MAT-20254'],
                ['ELC-30215', 'ELC-30114'],
                ['ELN-31325', 'ELC-30114'],
                ['ELN-30314', 'SYC-22113'],
                ['DIN-31143', 'DIN-21133'],
                ['ADO-10102', 'ADO-10101'],
                ['ELC-30125', 'ELC-30114'],
                ['ELC-30125', 'ELC-30215'],
                ['ELN-30115', 'ELC-30114'],
                ['ELN-30115', 'QUF-33035'],
                ['ELN-31335', 'ELN-31325'],
                ['ELN-33155', 'ELN-33154'],
                ['ELN-34105', 'SYC-22113'],
                ['DIN-31153', 'DIN-31143'],
                ['ADO-10103', 'ADO-10102'],
                ['ELC-32105', 'ELN-30314'],
                ['ELC-32105', 'ELC-30125'],
                ['ELN-33415', 'ELC-30215'],
                ['ELN-33415', 'ELN-30125'],
                ['ELN-33205', 'ELN-33415'],
                ['ELN-31415', 'ELN-31335'],
                ['ELN-30125', 'ELN-30115'],
                ['ADG-10821', 'ADG-10820'],
                ['DIN-31163', 'DIN-31153'],
                ['ELC-32415', 'ELC-32105'],
                ['TLC-31145', 'ELN-33154'],
                ['TLC-31145', 'ELN-30115'],
                ['ELN-30135', 'ELC-32105'],
                ['ELN-33215', 'ELN-33205'],
                ['DIN-31173', 'DIN-31163'],
                ['PRO-01',    'TAI-01'],
                ['ELN-33324', 'ELN-33215'],
                ['ELN-31315', 'ELC-32105'],
                ['AGM-30314', 'ELN-33215'],
                ['AGM-30314', 'ELC-32415'],
                ['ELN-33301', 'ELN-33215'],
                ['DIN-31183', 'DIN-31173'],
                ['ADO-10104', 'ADO-10103'],
            ],

            // --- ING. DE TELECOMUNICACIONES ---
            'TLC' => [
                ['MAT-21215', 'MAT-21524'],
                ['MAT-21524', 'MAT-21215'],
                ['IDM-24123', 'IDM-24113'],
                ['QUF-23015', 'MAT-21215'],
                ['QUF-23015', 'MAT-21524'],
                ['MAT-21225', 'MAT-21215'],
                ['MAT-21225', 'MAT-21524'],
                ['MAT-21114', 'MAT-21215'],
                ['MAT-21114', 'MAT-21524'],
                ['ADG-25141', 'ADG-25131'],
                ['QUF-23025', 'QUF-23015'],
                ['QUF-23025', 'MAT-21225'],
                ['MAT-21235', 'MAT-21225'],
                ['MAT-21414', 'MAT-21225'],
                ['SYC-22113', 'MAT-21114'],
                ['MAT-21224', 'MAT-21235'],
                ['MAT-21224', 'MAT-21114'],
                ['TLC-31115', 'MAT-21235'],
                ['TLC-31115', 'QUF-23025'],
                ['ELN-35135', 'MAT-21224'],
                ['ELN-35135', 'TLC-31115'],
                ['QUF-33013', 'QUF-23025'],
                ['QUF-33013', 'MAT-21235'],
                ['ELN-35114', 'QUF-23025'],
                ['ELN-35114', 'MAT-21235'],
                ['TLC-31125', 'TLC-31115'],
                ['TLC-31225', 'QUF-33013'],
                ['TLC-32125', 'TLC-31225'],
                ['TLC-35215', 'ELN-35135'],
                ['TLC-35314', 'ELN-35114'],
                ['TLC-31235', 'TLC-31225'],
                ['ELN-32225', 'TLC-32125'],
                ['ELN-32225', 'TLC-31225'],
                ['TLC-35225', 'TLC-35215'],
                ['ELN-35325', 'TLC-35314'],
                ['TLC-31514', 'TLC-31235'],
                ['TLC-31514', 'TLC-35215'],
                ['SYC-32315', 'TLC-32125'],
                ['TLC-31325', 'TLC-31235'],
                ['TLC-31325', 'TLC-35225'],
                ['TLC-35414', 'TLC-35225'],
                ['TLC-35414', 'ELN-35344'],
                ['ELN-35344', 'MAT-21524'],
                ['ELN-35323', 'TLC-35225'],
                ['TLC-35424', 'TLC-35414'],
                ['TLC-35465', 'TLC-35424'],
                ['TLC-31323', 'TLC-35465'],
                // Nota: TGR-30010 y PSI-30010 exigen 191 UC aprobadas
            ],

            // --- ING. MECÁNICA ---
            'MEC' => [
                ['MAT-21215', 'MAT-21524'],
                ['ADG-21131', 'MAT-21215'],
                ['IDM-24123', 'IDM-24113'],
                ['QUF-23015', 'MAT-21215'],
                ['QUF-23015', 'MAT-21524'],
                ['MAT-21225', 'MAT-21215'],
                ['MAT-21225', 'MAT-21524'],
                ['MAT-21114', 'MAT-21215'],
                ['MAT-21114', 'MAT-21524'],
                ['ADG-21141', 'ADG-21131'],
                ['DIN-21123', 'DIN-21113'],
                ['QUF-23025', 'QUF-23015'],
                ['QUF-23025', 'MAT-21225'],
                ['MAT-21235', 'MAT-21225'],
                ['MAT-21414', 'MAT-21225'],
                ['SYC-22113', 'MAT-21114'],
                ['MAT-20814', 'MAT-21235'],
                ['MAT-20814', 'MAT-21114'],
                ['DIN-21133', 'DIN-21123'],
                ['MAT-30265', 'MAT-21235'],
                ['MEC-30115', 'QUF-23025'],
                ['MEC-30115', 'MAT-21235'],
                ['QUF-30315', 'QUF-23025'],
                ['QUF-30315', 'MAT-21235'],
                ['MAT-30123', 'MAT-21212'],
                ['SYC-30114', 'SYC-22113'],
                ['MEC-30314', 'QUF-22014'],
                ['DIN-31143', 'DIN-21133'],
                ['ADO-10102', 'ADO-10101'],
                ['QUF-30325', 'MAT-30265'],
                ['QUF-30325', 'QUF-30315'],
                ['ELC-30315', 'QUF-23025'],
                ['MEC-30215', 'MEC-30115'],
                ['MEC-30414', 'MEC-30115'],
                ['MEC-30414', 'QUF-30315'],
                ['MEC-30124', 'MAT-30123'],
                ['DIN-31153', 'DIN-31143'],
                ['MEC-30614', 'MEC-30215'],
                ['MEC-30134', 'MEC-30115'],
                ['QUF-30514', 'QUF-30315'],
                ['SYC-30814', 'MAT-30265'],
                ['MEC-30714', 'MEC-30414'],
                ['MEC-30625', 'MEC-30614'],
                ['ADG-10821', 'ADG-10820'],
                ['DIN-31163', 'DIN-31153'],
                ['MEC-30915', 'MEC-30815'],
                ['MEC-30815', 'MEC-30134'],
                ['MEC-30815', 'MEC-30115'],
                ['MEC-30815', 'MEC-30915'],
                ['DIN-31173', 'DIN-31163'],
                ['PRO-01',    'TAI-01'],
                ['MEC-30825', 'MEC-30815'],
                ['MEC-31115', 'MEC-30414'],
                ['MEC-31115', 'QUF-30514'],
                ['MEC-31115', 'MEC-31015'],
                ['DIN-31183', 'DIN-31173'],
                ['ADO-10104', 'ADO-10103'],
            ],

            // --- LIC. ADMINISTRACIÓN Y GESTIÓN MUNICIPAL ---
            'AGM' => [
                ['ARH-37113', 'ADG-34213'],
                ['MAT-31343', 'SOC-33312'],
                ['MAT-31343', 'ADG-34213'],
                ['SOC-33213', 'SOC-33113'],
                ['ADG-34224', 'ADG-34213'],
                ['MAT-31314-AGM', 'MAT-31114-AGM'],
                ['MAT-31224', 'MAT-31214-AGM'],
                ['MAT-31353', 'MAT-31343'],
                ['MAT-31233', 'MAT-31224'],
                ['MAT-31233', 'MAT-31114-AGM'],
                ['SOC-33223', 'SOC-33213'],
                ['CJU-35123', 'CJU-35113'],
                ['MAT-31334', 'ADG-34213'],
                ['MAT-31324', 'MAT-31314-AGM'],
                ['CJU-35133', 'CJU-35113'],
                ['ADG-34123', 'ADG-34213'],
                ['ADG-34234', 'ADG-34224'],
                ['CJU-35214', 'CJU-35113'],
                ['AGL-36213', 'ADG-34123'],
                ['CJU-35233', 'ADG-34234'],
                ['CJU-35233', 'CJU-35113'],
                ['CJU-35163', 'ADG-34224'],
                ['ADG-30213', 'SYC-32133'],
                ['AGL-36113', 'ADG-34234'],
                ['AGL-36113', 'CJU-35214'],
                ['ARH-37123', 'SOC-33223'],
                ['ADG-34243', 'ADG-34234'],
                ['ADG-34243', 'CJU-35214'],
                ['SYC-32133', 'AGL-36213'],
                ['AGL-36143', 'AGL-36133'],
                ['AGL-36163', 'ADG-30213'],
                ['ARH-37213', 'CJU-35163'],
                ['ADG-34134', 'ADG-34224'],
                ['ADG-34134', 'AGL-36113'],
                ['AGL-36233', 'AGL-36113'],
                ['AGL-36224', 'ADG-34224'],
                ['AGL-36224', 'AGL-36113'],
                ['ADG-34143', 'AGL-36163'],
                ['CJU-35173', 'ADG-34134'],
                ['ADG-34253', 'AGL-36243'],
                ['AGL-36243', 'AGL-36233'],
                ['AGL-36243', 'AGL-36224'],
                // Nota: TGR-30010 y PSI-30010 exigen 154 UC aprobadas
            ],
        ];

        foreach ($prelaciones as $codCarrera => $pares) {
            $idCarrera = $carreraIds[$codCarrera];
            foreach ($pares as [$codPrelada, $codPreladora]) {
                DB::table('prelaciones')->updateOrInsert(
                    [
                        'id_carrera' => $idCarrera,
                        'id_materia_prelada' => $materiaIds[$codPrelada],
                        'id_materia_preladora' => $materiaIds[$codPreladora],
                    ],
                    [
                        'estatus' => 1,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
            }
        }
    }
}