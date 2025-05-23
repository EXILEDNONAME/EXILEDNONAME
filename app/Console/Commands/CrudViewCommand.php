<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CrudViewCommand extends Command {

  protected $signature = 'crud:view
  {name : The name of the Crud.}
  {--fields= : The field names for the form.}
  {--view-path= : The name of the view path.}
  {--route-group= : Prefix of the route group.}
  {--pk=id : The name of the primary key.}
  {--validations= : Validation rules for the fields.}
  {--form-helper=html : Helper for the form.}
  {--custom-data= : Some additional values to use in the crud.}
  {--localize=no : Localize the view? yes|no.}';

  protected $description = 'Create views for the Crud.';
  protected $viewDirectoryPath;

  protected $typeLookup = [
    'string' => 'text',
    'char' => 'text',
    'varchar' => 'text',
    'text' => 'textarea',
    'mediumtext' => 'textarea',
    'longtext' => 'textarea',
    'json' => 'textarea',
    'jsonb' => 'textarea',
    'binary' => 'textarea',
    'password' => 'password',
    'email' => 'email',
    'number' => 'number',
    'integer' => 'number',
    'bigint' => 'number',
    'mediumint' => 'number',
    'tinyint' => 'number',
    'smallint' => 'number',
    'decimal' => 'number',
    'double' => 'number',
    'float' => 'number',
    'date' => 'date',
    'datetime' => 'datetime-local',
    'timestamp' => 'datetime-local',
    'time' => 'time',
    'radio' => 'radio',
    'boolean' => 'radio',
    'enum' => 'select',
    'select' => 'select',
    'file' => 'file',
  ];

  protected $vars = [
    'formFields',
    'formFieldsHtml',
    'varName',
    'crudName',
    'crudNameCap',
    'crudNameTitle',
    'crudNameSingular',
    'primaryKey',
    'modelName',
    'modelNameCap',
    'viewName',
    'viewNameSingular',
    'routePrefix',
    'routePrefixCap',
    'routeGroup',
    'formHeadingHtml',
    'formBodyHtml',
    'viewTemplateDir',
    'formBodyHtmlForShowView',
  ];

  protected $formFields = [];
  protected $formFieldsHtml = '';
  protected $defaultColumnsToShow = 3;
  protected $varName = '';
  protected $crudName = '';
  protected $crudNameCap = '';
  protected $crudNameTitle = '';
  protected $crudNameSingular = '';
  protected $primaryKey = 'id';
  protected $modelName = '';
  protected $modelNameCap = '';
  protected $viewName = '';
  protected $viewNameSingular = '';
  protected $routePrefix = '';
  protected $routePrefixCap = '';
  protected $routeGroup = '';
  protected $formHeadingHtml = '';
  protected $formBodyHtml = '';
  protected $formBodyHtmlForShowView = '';
  protected $customData = [];
  protected $viewTemplateDir = '';
  protected $delimiter;

  public function __construct() {
    parent::__construct();
    if (config('crudgenerator.view_columns_number')) { $this->defaultColumnsToShow = config('crudgenerator.view_columns_number'); }
    $this->delimiter = config('crudgenerator.custom_delimiter') ? config('crudgenerator.custom_delimiter') : ['%%', '%%'];
  }

  public function handle() {
    $var1 = Str::snake($this->argument('name'));
    $var2 = str_replace("_", " ", $var1);
    $var3 = ucwords($var2);

    $formHelper = $this->option('form-helper');
    $this->viewDirectoryPath = config('crudgenerator.custom_template') ? config('crudgenerator.path') . 'views/' . $formHelper . '/' : __DIR__ . '/../stubs/views/' . $formHelper . '/';
    $this->crudName = strtolower($this->argument('name'));
    $this->varName = lcfirst($this->argument('name'));
    $this->crudNameCap = ucwords($this->crudName);
    $this->crudNameTitle = $var3;
    $this->crudNameSingular = Str::singular($this->crudName);
    $this->modelName = Str::singular($this->argument('name'));
    $this->modelNameCap = ucfirst($this->modelName);
    $this->customData = $this->option('custom-data');
    $this->primaryKey = $this->option('pk');
    $this->routeGroup = ($this->option('route-group')) ? $this->option('route-group') . '/' : $this->option('route-group');
    $this->routePrefix = ($this->option('route-group')) ? $this->option('route-group') : '';
    $this->routePrefixCap = ucfirst($this->routePrefix);
    $this->viewName = Str::snake($this->argument('name'), '-');
    $this->viewNameSingular = Str::singular(Str::snake($this->argument('name'), '-'));

    $viewDirectory = config('view.paths')[0] . '/';
    if ($this->option('view-path')) {
      $this->userViewPath = $this->option('view-path');
      $path = $viewDirectory . $this->userViewPath . '/' . $this->viewNameSingular . '/';
    } else {
      $path = $viewDirectory . $this->viewNameSingular . '/';
    }

    $this->viewTemplateDir = isset($this->userViewPath) ? $this->userViewPath . '.' . $this->viewNameSingular : $this->viewNameSingular;

    if (!File::isDirectory($path)) {
      File::makeDirectory($path, 0755, true);
    }

    $fields = $this->option('fields');
    $fieldsArray = explode(';', $fields);

    $this->formFields = [];

    $validations = $this->option('validations');

    if ($fields) {
      $x = 0;
      foreach ($fieldsArray as $item) {
        $itemArray = explode('#', $item);

        $this->formFields[$x]['name'] = trim($itemArray[0]);
        $this->formFields[$x]['type'] = trim($itemArray[1]);
        $this->formFields[$x]['required'] = preg_match('/' . $itemArray[0] . '/', $validations)? true : false;

        if (($this->formFields[$x]['type'] === 'select'
        || $this->formFields[$x]['type'] === 'enum')
        && isset($itemArray[2])
      ) {
        $options = trim($itemArray[2]);
        $options = str_replace('options=', '', $options);

        $this->formFields[$x]['options'] = $options;
      }

      $x++;
    }
  }

  foreach ($this->formFields as $item) {
    $this->formFieldsHtml .= $this->createField($item);
  }

  $i = 0;
  foreach ($this->formFields as $key => $value) {
    // if ($i == $this->defaultColumnsToShow) {
    //   break;
    // }

    $field = $value['name'];
    $label = ucwords(str_replace('_', ' ', $field));
    if ($this->option('localize') == 'yes') {
      $label = '{{ trans(\'' . $this->crudName . '.' . $field . '\') }}';
    }
    $this->formHeadingHtml .= "<th> " . $label . " </th> \n";
    $this->formBodyHtml .= "{ data: '$field' }, \n" ;
    $this->formBodyHtmlForShowView .= "\n" . '<tr>
  <td> ' . $label . ' </td>
  <td> {{ $data->' . $field . ' }} </td>
</tr>';

    $i++;
  }

  $this->templateStubs($path);

  $this->info('View created successfully.');
}

/**
* Default template configuration if not provided
*
* @return array
*/
private function defaultTemplating()
{
  return [
    'index' => ['formHeadingHtml', 'formBodyHtml', 'crudName', 'crudNameCap', 'crudNameTitle', 'modelName', 'viewName', 'viewNameSingular', 'routeGroup', 'primaryKey'],
    'form' => ['formFieldsHtml'],
    'create' => ['crudName', 'crudNameCap', 'crudNameTitle', 'modelName', 'modelNameCap', 'viewName', 'routeGroup', 'viewTemplateDir'],
    'edit' => ['crudName', 'crudNameSingular', 'crudNameCap', 'crudNameTitle', 'modelNameCap', 'modelName', 'viewName', 'routeGroup', 'primaryKey', 'viewTemplateDir'],
    'show' => ['formHeadingHtml', 'formBodyHtml', 'formBodyHtmlForShowView', 'crudName', 'crudNameSingular', 'crudNameCap', 'crudNameTitle', 'modelName', 'viewName', 'routeGroup', 'primaryKey'],
    'activity' => ['formHeadingHtml', 'formBodyHtml', 'formBodyHtmlForShowView', 'crudName', 'crudNameSingular', 'crudNameCap', 'crudNameTitle','modelName', 'viewName', 'routeGroup', 'primaryKey'],
    'trash' => ['formHeadingHtml', 'formBodyHtml', 'formBodyHtmlForShowView', 'crudName', 'crudNameSingular', 'crudNameCap', 'crudNameTitle', 'modelName', 'viewName', 'routeGroup', 'primaryKey'],
  ];
}

/**
* Generate files from stub
*
* @param $path
*/
protected function templateStubs($path)
{
  $dynamicViewTemplate = config('crudgenerator.dynamic_view_template')
  ? config('crudgenerator.dynamic_view_template')
  : $this->defaultTemplating();

  foreach ($dynamicViewTemplate as $name => $vars) {
    $file = $this->viewDirectoryPath . $name . '.blade.stub';
    $newFile = $path . $name . '.blade.php';
    if (!File::copy($file, $newFile)) {
      echo "failed to copy $file...\n";
    } else {
      $this->templateVars($newFile, $vars);
      $this->userDefinedVars($newFile);
    }
  }
}

/**
* Update specified values between delimiter with real values
*
* @param $file
* @param $vars
*/
protected function templateVars($file, $vars)
{
  $start = $this->delimiter[0];
  $end = $this->delimiter[1];

  foreach ($vars as $var) {
    $replace = $start . $var . $end;
    if (in_array($var, $this->vars)) {
      File::put($file, str_replace($replace, $this->$var, File::get($file)));
    }
  }
}

/**
* Update custom values between delimiter with real values
*
* @param $file
*/
protected function userDefinedVars($file)
{
  $start = $this->delimiter[0];
  $end = $this->delimiter[1];

  if ($this->customData !== null) {
    $customVars = explode(';', $this->customData);
    foreach ($customVars as $rawVar) {
      $arrayVar = explode('=', $rawVar);
      File::put($file, str_replace($start . $arrayVar[0] . $end, $arrayVar[1], File::get($file)));
    }
  }
}

/**
* Form field wrapper.
*
* @param  string $item
* @param  string $field
*
* @return string
*/
protected function wrapField($item, $field)
{
  $formGroup = File::get($this->viewDirectoryPath . 'form-fields/wrap-field.blade.stub');

  $labelText = ucwords(strtolower(str_replace('_', ' ', $item['name'])));

  if ($this->option('localize') == 'yes') {
    $labelText = 'trans(\'' . $this->crudName . '.' . $item['name'] . '\')';
  }

  return sprintf($formGroup, $item['name'], $labelText, $field);
}

/**
* Form field generator.
*
* @param  array $item
*
* @return string
*/
protected function createField($item)
{
  switch ($this->typeLookup[$item['type']]) {
    case 'password':
    return $this->createPasswordField($item);
    case 'datetime-local':
    case 'time':
    return $this->createInputField($item);
    case 'radio':
    return $this->createRadioField($item);
    case 'textarea':
    return $this->createTextareaField($item);
    case 'select':
    case 'enum':
    return $this->createSelectField($item);
    default: // text
    return $this->createFormField($item);
  }
}

/**
* Create a specific field using the form helper.
*
* @param  array $item
*
* @return string
*/
protected function createFormField($item)
{
  $start = $this->delimiter[0];
  $end = $this->delimiter[1];

  $required = $item['required'] ? '->required()' : '';

  $markup = File::get($this->viewDirectoryPath . 'form-fields/form-field.blade.stub');
  $markup = str_replace($start . 'required' . $end, $required, $markup);
  $markup = str_replace($start . 'fieldType' . $end, $this->typeLookup[$item['type']], $markup);
  $markup = str_replace($start . 'itemName' . $end, $item['name'], $markup);
  $markup = str_replace($start . 'crudNameSingular' . $end, $this->crudNameSingular, $markup);

  return $this->wrapField(
    $item,
    $markup
  );
}

/**
* Create a password field using the form helper.
*
* @param  array $item
*
* @return string
*/
protected function createPasswordField($item)
{
  $start = $this->delimiter[0];
  $end = $this->delimiter[1];

  $required = $item['required'] ? 'required' : '';

  $markup = File::get($this->viewDirectoryPath . 'form-fields/password-field.blade.stub');
  $markup = str_replace($start . 'required' . $end, $required, $markup);
  $markup = str_replace($start . 'itemName' . $end, $item['name'], $markup);
  $markup = str_replace($start . 'crudNameSingular' . $end, $this->crudNameSingular, $markup);

  return $this->wrapField(
    $item,
    $markup
  );
}

/**
* Create a generic input field using the form helper.
*
* @param  array $item
*
* @return string
*/
protected function createInputField($item)
{
  $start = $this->delimiter[0];
  $end = $this->delimiter[1];

  $required = $item['required'] ? 'required' : '';

  $markup = File::get($this->viewDirectoryPath . 'form-fields/input-field.blade.stub');
  $markup = str_replace($start . 'required' . $end, $required, $markup);
  $markup = str_replace($start . 'fieldType' . $end, $this->typeLookup[$item['type']], $markup);
  $markup = str_replace($start . 'itemName' . $end, $item['name'], $markup);
  $markup = str_replace($start . 'crudNameSingular' . $end, $this->crudNameSingular, $markup);

  return $this->wrapField(
    $item,
    $markup
  );
}

/**
* Create a yes/no radio button group using the form helper.
*
* @param  array $item
*
* @return string
*/
protected function createRadioField($item)
{
  $start = $this->delimiter[0];
  $end = $this->delimiter[1];

  $markup = File::get($this->viewDirectoryPath . 'form-fields/radio-field.blade.stub');
  $markup = str_replace($start . 'itemName' . $end, $item['name'], $markup);
  $markup = str_replace($start . 'crudNameSingular' . $end, $this->crudNameSingular, $markup);

  return $this->wrapField(
    $item,
    $markup
  );
}

/**
* Create a textarea field using the form helper.
*
* @param  array $item
*
* @return string
*/
protected function createTextareaField($item)
{
  $start = $this->delimiter[0];
  $end = $this->delimiter[1];

  $required = $item['required'] ? 'required' : '';

  $markup = File::get($this->viewDirectoryPath . 'form-fields/textarea-field.blade.stub');
  $markup = str_replace($start . 'required' . $end, $required, $markup);
  $markup = str_replace($start . 'fieldType' . $end, $this->typeLookup[$item['type']], $markup);
  $markup = str_replace($start . 'itemName' . $end, $item['name'], $markup);
  $markup = str_replace($start . 'crudNameSingular' . $end, $this->crudNameSingular, $markup);

  return $this->wrapField(
    $item,
    $markup
  );
}

/**
* Create a select field using the form helper.
*
* @param  array $item
*
* @return string
*/
protected function createSelectField($item)
{
  $start = $this->delimiter[0];
  $end = $this->delimiter[1];

  $required = $item['required'] ? 'required' : '';

  $markup = File::get($this->viewDirectoryPath . 'form-fields/select-field.blade.stub');
  $markup = str_replace($start . 'required' . $end, $required, $markup);
  $markup = str_replace($start . 'options' . $end, $item['options'], $markup);
  $markup = str_replace($start . 'itemName' . $end, $item['name'], $markup);
  $markup = str_replace($start . 'crudNameSingular' . $end, $this->crudNameSingular, $markup);

  return $this->wrapField(
    $item,
    $markup
  );
}
}
