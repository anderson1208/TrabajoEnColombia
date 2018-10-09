<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Vacant;
use App\Company;
use App\Gender;
use App\AreaWork;
use App\WorkingDay;
use App\CivilStatus;
use App\VacantState;
use App\ContractType;
use App\EducationLevel;
use App\EducationState;
use App\CurriculumVitae;
use App\IdentificationType;
use App\EmploymentPreference;

class DatabaseSeeder extends Seeder
{

    /**
     * Seeded areaWorks.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $areaWorks = [
    	'ventas', 'atención al cliente', 'producción / operario', 'manufactura', 'administración / oficina', 'medicina / salud', 'seguridad', 'mantenimiento y reparaciones', 'técnicas', 'informatica / telecomunicaciones', 'contabilidad / finanzas', 'hosteleria / turismo', 'ingeniería', 'recursos humanos', 'mercado tecnia / publicidad', 'comunicación', 'docencia', 'diseño / artes gráficas', 'legal / asesoria', 'dirección / gerencia', 'otros'
    ];

    /**
     * Seeded workingDay.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $workingDays = [
    	'tiempo completo', 'tiempo parcial', 'por horas', 'beclas/practicas', 'desde casa'
    ];

    /**
     * Seeded contractTypes.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $contractTypes = [
    	'obra labor', 'a término indefinido', 'a término fijo', 'de aprendizaje', 
    	'civil por prestación de servicio', 'ocacional de trabajo'
    ];

    /**
     * Seeded educationLevels.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $educationLevels = [
    	'educación básica primaria', 'educación básica secundaria', 'bachillerato / educación media', 'universidad / carrera técnica', 'universidad / carrera tecnológica', 'universidad / carrera profesional', 'postgrado / ezpecialización', 'postgrado / maestria', 'postgrado / doctorado'
    ];

    /**
     * Seeded educationStates.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $educationStates = [
    	'culminado', 'cursando', 'abandonado / aplazado', 
    ];

    /**
     * Seeded identificationTypes.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $identificationTypes = [
    	[
    		'name'	=>	'cedula de ciudadania',
    		'abbreviation' => 'c.c'
    	],
    	[
    		'name'	=>	'pasaporte',
    		'abbreviation' => 'pp'
    	],
    	[
    		'name'	=>	'cedula extranjera',
    		'abbreviation' => 'c.e'
    	]
    ];

    /**
     * Seeded genders.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $genders = [
    	'hombre', 'mujer'
    ];

    /**
     * Seeded vacantStates.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $vacantStates = [
    	'aplicada', 'hoja de vida vista', 'en proceso', 'finalista'
    ];

    /**
     * Seeded civilStatus.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $civilStatus = [
    	'soltero(a)', 'casado(a)', 'divorciado(a)', 'vuido(a)'
    ];

    /**
     * Seeded companies.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $companies;

    /**
     * Seeded users.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $users;

    /**
     * Seeded vacants.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $vacants;


    /**
     * Seed functions.
     *
     * @var array
     */
    protected $seeds = [
        'migrate',
        'genders',
        'areaWorks',
        'civilStatus',
        'workingDays',
        'vacantStates',
        'contractTypes',
        'educationLevels',
        'educationStates',
        'identificationTypes',
        'companies',
        'users',
        'vacants',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->seeds as $seed) {
            $this->command->line("Processing: {$seed}");
            call_user_func([$this, $seed]);
        }
    }

    /**
     * (Re)Migrate tables.
     *
     * @return void
     */
    public function migrate()
    {
        $this->command->call('migrate:reset');
        $this->command->call('migrate');
        $this->command->line('Migrated tables.');
    }

    /**
     * Seed genders.
     *
     * @return void
     */
    public function genders()
    {
    	$gendersTemp = collect();

    	foreach($this->genders as $gender)
    	{	
    		$gendersTemp->push(
    			factory(Gender::class)->create(['name'	=>	$gender])
    		);
    	}

    	$this->genders = $gendersTemp;
    }

    /**
     * Seed areaWorks.
     *
     * @return void
     */
    public function areaWorks()
    {
    	$areaWorksTemp = collect();

    	foreach($this->areaWorks as $areaWork)
    	{	
    		$areaWorksTemp->push(
    			factory(AreaWork::class)->create(['name'	=>	$areaWork])
    		);
    	}

    	$this->areaWorks = $areaWorksTemp;
    }

    /**
     * Seed civilStatus.
     *
     * @return void
     */
    public function civilStatus()
    {
    	$civilStatusTemp = collect();

    	foreach($this->civilStatus as $civilStatus)
    	{	
    		$civilStatusTemp->push(
    			factory(CivilStatus::class)->create(['name'	=>	$civilStatus])
    		);
    	}

    	$this->civilStatus = $civilStatusTemp;
    }

    /**
     * Seed workingDays.
     *
     * @return void
     */
    public function workingDays()
    {
    	$workingDaysTemp = collect();

    	foreach($this->workingDays as $workingDays)
    	{	
    		$workingDaysTemp->push(
    			factory(WorkingDay::class)->create(['name'	=>	$workingDays])
    		);
    	}

    	$this->workingDays = $workingDaysTemp;
    }

    /**
     * Seed vacantStates.
     *
     * @return void
     */
    public function vacantStates()
    {
    	$vacantStatesTemp = collect();

    	foreach($this->vacantStates as $vacantState)
    	{	
    		$vacantStatesTemp->push(
    			factory(VacantState::class)->create(['name'	=>	$vacantState])
    		);
    	}

    	$this->vacantStates = $vacantStatesTemp;
    }

    /**
     * Seed contractTypes.
     *
     * @return void
     */
    public function contractTypes()
    {
    	$contractTypesTemp = collect();

    	foreach($this->contractTypes as $contractType)
    	{	
    		$contractTypesTemp->push(
    			factory(ContractType::class)->create(['name'	=>	$contractType])
    		);
    	}

    	$this->contractTypes = $contractTypesTemp;
    }

    /**
     * Seed educationLevels.
     *
     * @return void
     */
    public function educationLevels()
    {
    	$educationLevelsTemp = collect();

    	foreach($this->educationLevels as $educationLevel)
    	{	
    		$educationLevelsTemp->push(
    			factory(EducationLevel::class)->create(['name'	=>	$educationLevel])
    		);
    	}

    	$this->educationLevels = $educationLevelsTemp;
    }

    /**
     * Seed educationStates.
     *
     * @return void
     */
    public function educationStates()
    {
    	$educationStatesTemp = collect();

    	foreach($this->educationStates as $educationState)
    	{	
    		$educationStatesTemp->push(
    			factory(EducationState::class)->create(['name'	=>	$educationState])
    		);
    	}

    	$this->educationStates = $educationStatesTemp;
    }

    /**
     * Seed identificationTypes.
     *
     * @return void
     */
    public function identificationTypes()
    {
    	$identificationTypesTemp = collect();

    	foreach($this->identificationTypes as $identificationType)
    	{	
    		$identificationTypesTemp->push(
    			factory(IdentificationType::class)->create($identificationType)
    		);
    	}

    	$this->identificationTypes = $identificationTypesTemp;
    }

    /**
     * Seed companies.
     *
     * @return void
     */
    public function companies()
    {
    	$this->companies = factory(Company::class, 10)->create();
    }

    /**
     * Seed users.
     *
     * @return void
     */
    public function users()
    {
        $this->users = collect();

    	factory(User::class, 10)->create()->each(function($user){
            $this->users->push($user);

            // Creamos la hoja de vida vacia
            $user->cv()->save(new CurriculumVitae);
            $user->employmentPreference()->save(new EmploymentPreference);
        });
    }

    /**
     * Seed vacants.
     *
     * @return void
     */
    public function vacants()
    {
    	$this->vacants = collect();

    	$this->companies->each(function($company){

    		$company->vacants()->saveMany(
    			factory(Vacant::class, 5)->make([
	    			'company_id'		=>	$company->id,
    			])->each(function($vacant){
    				$this->vacants->push($vacant);
    			})
    		);
    	});
    }
}
