<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Company;
use App\Models\JobPosting;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── 1. Administrador UNIPAZ ──────────────────────────────────────────
        User::create([
            'name'              => 'Administrador UNIPAZ',
            'email'             => 'admin@unipaz.edu.co',
            'password'          => Hash::make('Admin2024*'),
            'role'              => 'admin',
            'email_verified_at' => now(),
            'active'            => true,
        ]);

        // ─── 2. Empresa de prueba (aprobada) ──────────────────────────────────
        $companyUser = User::create([
            'name'              => 'Juan Pérez',
            'email'             => 'info@tecnosoluciones.com',
            'password'          => Hash::make('Empresa2024*'),
            'role'              => 'company',
            'email_verified_at' => now(),
            'active'            => true,
        ]);

        $company = Company::create([
            'user_id'        => $companyUser->id,
            'company_name'   => 'TecnoSoluciones S.A.S.',
            'nit'            => '900.123.456-7',
            'sector'         => 'Tecnología e informática',
            'contact_person' => 'Juan Pérez',
            'phone'          => '+57 310 555 0001',
            'address'        => 'Calle 50 # 20-15, Centro, Barrancabermeja',
            'description'    => 'Empresa líder en soluciones tecnológicas para el sector petrolero y empresas de la región del Magdalena Medio.',
            'status'         => 'approved',
        ]);

        // ─── 3. Segunda empresa (pendiente de aprobación) ─────────────────────
        $company2User = User::create([
            'name'              => 'María García',
            'email'             => 'contacto@distribuidoraregional.com',
            'password'          => Hash::make('Empresa2024*'),
            'role'              => 'company',
            'email_verified_at' => now(),
            'active'            => true,
        ]);

        Company::create([
            'user_id'        => $company2User->id,
            'company_name'   => 'Distribuidora Regional del Magdalena',
            'nit'            => '800.456.789-2',
            'sector'         => 'Comercio y retail',
            'contact_person' => 'María García',
            'phone'          => '+57 320 555 0002',
            'address'        => 'Carrera 15 # 45-22, Barrancabermeja',
            'status'         => 'pending',
        ]);

        // ─── 4. Vacantes de prueba ────────────────────────────────────────────
        $jobs = [
            [
                'title'           => 'Desarrollador Web Junior',
                'description'     => 'Buscamos un desarrollador web con conocimientos en PHP, JavaScript y bases de datos para unirse a nuestro equipo.',
                'requirements'    => '- Estudiante de últimos semestres o recién graduado de Ingeniería de Sistemas o afines\n- Conocimientos en HTML, CSS, JavaScript\n- Manejo básico de PHP o Python\n- Buenas habilidades de comunicación',
                'responsibilities' => '- Desarrollar y mantener aplicaciones web\n- Participar en reuniones de equipo\n- Documentar el código desarrollado',
                'area'            => 'Tecnología e informática',
                'contract_type'   => 'Término fijo',
                'modality'        => 'hybrid',
                'location'        => 'Barrancabermeja',
                'salary_range'    => '$1.500.000 - $2.000.000',
                'positions'       => 2,
                'deadline'        => now()->addDays(30)->format('Y-m-d'),
                'programs_targeted' => 'Ingeniería de Sistemas, Ingeniería Informática',
            ],
            [
                'title'           => 'Asistente Administrativo',
                'description'     => 'Apoyo en funciones administrativas, gestión documental y atención al cliente para nuestra sede en Barrancabermeja.',
                'requirements'    => '- Estudiante de Administración de Empresas o Contaduría\n- Manejo de herramientas Office (Word, Excel)\n- Buena presentación y habilidades de comunicación\n- Disponibilidad inmediata',
                'responsibilities' => '- Archivo y gestión documental\n- Atención telefónica y presencial\n- Elaboración de informes',
                'area'            => 'Administración de empresas',
                'contract_type'   => 'Práctica / Pasantía',
                'modality'        => 'onsite',
                'location'        => 'Barrancabermeja',
                'salary_range'    => '$1.300.000',
                'positions'       => 1,
                'deadline'        => now()->addDays(20)->format('Y-m-d'),
                'programs_targeted' => 'Administración de Empresas, Contaduría Pública',
            ],
            [
                'title'           => 'Analista de Datos (Junior)',
                'description'     => 'Apoya al equipo de análisis con la recolección, procesamiento y visualización de datos del negocio.',
                'requirements'    => '- Conocimientos en Excel avanzado o Power BI\n- Nociones de SQL o Python para análisis\n- Estudiante de ingeniería, estadística o afines',
                'area'            => 'Tecnología e informática',
                'contract_type'   => 'Término fijo',
                'modality'        => 'remote',
                'location'        => 'Remoto (Barrancabermeja)',
                'salary_negotiable' => true,
                'positions'       => 1,
                'deadline'        => now()->addDays(45)->format('Y-m-d'),
            ],
        ];

        foreach ($jobs as $jobData) {
            JobPosting::create(array_merge($jobData, [
                'company_id' => $company->id,
                'status'     => 'active',
                'requires_cv' => true,
            ]));
        }

        // ─── 5. Estudiante de prueba ──────────────────────────────────────────
        $studentUser = User::create([
            'name'              => 'Carlos Andrés López',
            'email'             => 'carlos.lopez@unipaz.edu.co',
            'password'          => Hash::make('Student2024*'),
            'role'              => 'student',
            'email_verified_at' => now(),
            'active'            => true,
        ]);

        StudentProfile::create([
            'user_id'      => $studentUser->id,
            'student_code' => 'U2024001',
            'program'      => 'Ingeniería de Sistemas',
            'semester'     => '8',
            'phone'        => '+57 315 123 4567',
            'about'        => 'Estudiante de octavo semestre con experiencia en desarrollo web y bases de datos.',
        ]);

        $this->command->info('✅ Base de datos sembrada correctamente.');
        $this->command->info('');
        $this->command->info('📋 Credenciales de acceso:');
        $this->command->info('   Admin:    admin@unipaz.edu.co / Admin2024*');
        $this->command->info('   Empresa:  info@tecnosoluciones.com / Empresa2024*');
        $this->command->info('   Estudiante: carlos.lopez@unipaz.edu.co / Student2024*');
        $this->command->info('   (Estudiantes normalmente ingresan solo con Google OAuth)');
    }
}
