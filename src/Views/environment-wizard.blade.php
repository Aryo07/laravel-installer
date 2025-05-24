@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ __('installer_messages.environment.wizard.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-magic fa-fw" aria-hidden="true"></i>
    {!! __('installer_messages.environment.wizard.title') !!}
@endsection

@section('container')
    <div class="tabs tabs-full">

        <input id="tab1" type="radio" name="tabs" class="tab-input" checked />
        <label for="tab1" class="tab-label">
            <i class="fa fa-cog fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ __('installer_messages.environment.wizard.tabs.environment') }}
        </label>

        <input id="tab2" type="radio" name="tabs" class="tab-input" />
        <label for="tab2" class="tab-label">
            <i class="fa fa-database fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ __('installer_messages.environment.wizard.tabs.database') }}
        </label>

        <input id="tab3" type="radio" name="tabs" class="tab-input" />
        <label for="tab3" class="tab-label">
            <i class="fa fa-cogs fa-2x fa-fw" aria-hidden="true"></i>
            <br />
            {{ __('installer_messages.environment.wizard.tabs.application') }}
        </label>

        <form method="post" action="{{ route('LaravelInstaller::environmentSaveWizard') }}" class="tabs-wrap">
            <input type="hidden" name="laravel_version" value="{{ $laravelVersion }}">
            {{-- Environment Tab --}}
            <div class="tab" id="tab1content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group {{ $errors->has('app_name') ? ' has-error ' : '' }}">
                    <label for="app_name">
                        {{ __('installer_messages.environment.wizard.form.app_name_label') }}
                    </label>
                    <input type="text" name="app_name" id="app_name" value="{{ old('app_name') }}" placeholder="{{ __('installer_messages.environment.wizard.form.app_name_placeholder') }}" />
                    @if ($errors->has('app_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('environment') ? ' has-error ' : '' }}">
                    <label for="environment">
                        {{ __('installer_messages.environment.wizard.form.app_environment_label') }}
                    </label>
                    <select name="environment" id="environment" onchange='checkEnvironment(this.value);'>
                        <option value="local" selected>
                            {{ __('installer_messages.environment.wizard.form.app_environment_label_local') }}</option>
                        <option value="development">
                            {{ __('installer_messages.environment.wizard.form.app_environment_label_developement') }}
                        </option>
                        <option value="testing">
                            {{ __('installer_messages.environment.wizard.form.app_environment_label_testing') }}</option>
                        <option value="production">
                            {{ __('installer_messages.environment.wizard.form.app_environment_label_production') }}
                        </option>
                        <option value="other">
                            {{ __('installer_messages.environment.wizard.form.app_environment_label_other') }}</option>
                    </select>
                    <div id="environment_text_input" style="display: none;">
                        <input type="text" name="environment_custom" id="environment_custom" placeholder="{{ __('installer_messages.environment.wizard.form.app_environment_placeholder_other') }}" />
                    </div>
                    @if ($errors->has('environment'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('environment') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('app_debug') ? ' has-error ' : '' }}">
                    <label for="app_debug">
                        {{ __('installer_messages.environment.wizard.form.app_debug_label') }}
                    </label>
                    <label for="app_debug_true">
                        <input type="radio" name="app_debug" id="app_debug_true" value=true checked />
                        {{ __('installer_messages.environment.wizard.form.app_debug_label_true') }}
                    </label>
                    <label for="app_debug_false">
                        <input type="radio" name="app_debug" id="app_debug_false" value=false />
                        {{ __('installer_messages.environment.wizard.form.app_debug_label_false') }}
                    </label>
                    @if ($errors->has('app_debug'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_debug') }}
                        </span>
                    @endif
                </div>

                @if(in_array($laravelVersion, [11]))
                    <div class="form-group {{ $errors->has('app_timezone') ? ' has-error ' : '' }}">
                        <label for="app_timezone">
                            {{ __('installer_messages.environment.wizard.form.app_timezone_label') }}
                        </label>
                        <select name="app_timezone" id="app_timezone">
                            <option value="Asia/Jakarta" selected>
                                {{ __('installer_messages.environment.wizard.form.app_timezone_label_wib') }}</option>
                            <option value="Asia/Makassar">
                                {{ __('installer_messages.environment.wizard.form.app_timezone_label_wita') }}</option>
                            <option value="Asia/Jayapura">
                                {{ __('installer_messages.environment.wizard.form.app_timezone_label_wit') }}</option>
                            <option value="UTC">
                                {{ __('installer_messages.environment.wizard.form.app_timezone_label_utc') }}</option>
                        </select>
                        @if ($errors->has('app_timezone'))
                            <span class="error-block">
                                <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ $errors->first('app_timezone') }}
                            </span>
                        @endif
                    </div>
                @endif

                <div class="form-group {{ $errors->has('app_url') ? ' has-error ' : '' }}">
                    <label for="app_url">
                        {{ __('installer_messages.environment.wizard.form.app_url_label') }}
                    </label>
                    <input type="url" name="app_url" id="app_url" value="{{ old('app_url', 'http://localhost') }}" placeholder="{{ __('installer_messages.environment.wizard.form.app_url_placeholder') }}" />
                    @if ($errors->has('app_url'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_url') }}
                        </span>
                    @endif
                </div>

                @if(in_array($laravelVersion, [11, 12]))
                    <div class="form-group {{ $errors->has('app_maintenance_option') ? ' has-error ' : '' }}">
                        <label for="app_maintenance_option">
                            {{ __('installer_messages.environment.wizard.form.env_tabs.maintenance_option_label') }}
                        </label>
                        <label for="app_maintenance_driver_radio">
                            <input type="radio" name="app_maintenance_option" id="app_maintenance_driver_radio" value="driver" {{ old('app_maintenance_option', 'driver') == 'driver' ? 'checked' : '' }} onclick="toggleMaintenanceInputs('driver')" />
                            {{ __('installer_messages.environment.wizard.form.env_tabs.maintenance_driver_label') }}
                        </label>
                        <label for="app_maintenance_store_radio">
                            <input type="radio" name="app_maintenance_option" id="app_maintenance_store_radio" value="store" {{ old('app_maintenance_option') == 'store' ? 'checked' : '' }} onclick="toggleMaintenanceInputs('store')" />
                            {{ __('installer_messages.environment.wizard.form.env_tabs.maintenance_store_label') }}
                        </label>
                        @if ($errors->has('app_maintenance_option'))
                            <span class="error-block">
                                <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ $errors->first('app_maintenance_option') }}
                            </span>
                        @endif

                        <div id="driver_input" style="{{ old('app_maintenance_option', 'driver') == 'driver' ? '' : 'display:none;' }}">
                            <input type="text" name="app_maintenance_driver" id="app_maintenance_driver" value="{{ old('app_maintenance_driver', 'file') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.env_tabs.maintenance_driver_placeholder') }}" style="cursor: default; background-color: light-dark(rgba(239, 239, 239, 0.3), rgba(59, 59, 59, 0.3)); color: light-dark(rgb(84, 84, 84), rgb(170, 170, 170));" readonly />
                            @if ($errors->has('app_maintenance_driver'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('app_maintenance_driver') }}
                                </span>
                            @endif
                        </div>
                        <div id="store_input" style="{{ old('app_maintenance_option') == 'store' ? '' : 'display:none;' }}">
                            <input type="text" name="app_maintenance_store" id="app_maintenance_store" value="{{ old('app_maintenance_store', 'database') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.env_tabs.maintenance_store_placeholder') }}" style="cursor: default; background-color: light-dark(rgba(239, 239, 239, 0.3), rgba(59, 59, 59, 0.3)); color: light-dark(rgb(84, 84, 84), rgb(170, 170, 170));" readonly />
                            @if ($errors->has('app_maintenance_store'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('app_maintenance_store') }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="form-group {{ $errors->has('app_demo') ? ' has-error ' : '' }}">
                    <label for="app_demo">
                        {{ __('installer_messages.environment.wizard.form.app_demo_label') }}
                    </label>
                    <label for="app_demo_true">
                        <input type="radio" name="app_demo" id="app_demo_true" value=true />
                        {{ __('installer_messages.environment.wizard.form.app_demo_label_true') }}
                    </label>
                    <label for="app_demo_false">
                        <input type="radio" name="app_demo" id="app_demo_false" value=false checked />
                        {{ __('installer_messages.environment.wizard.form.app_demo_label_false') }}
                    </label>
                    @if ($errors->has('app_demo'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('app_demo') }}
                        </span>
                    @endif
                </div>

                {{-- Environment Extra Variables --}}
                <div class="block margin-bottom-2">
                    <input type="radio" name="envSettingsTabs" id="envSettingsTab1" value="null" />
                    <label for="envSettingsTab1">
                        <span>
                            {{ __('installer_messages.environment.wizard.form.env_tabs.env_tabs_title') }}
                        </span>
                    </label>
                    <div class="info">
                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('app_locale') ? ' has-error ' : '' }}">
                                <label
                                    for="app_locale">{{ __('installer_messages.environment.wizard.form.env_tabs.locale_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/localization#configuring-the-locale" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <select name="app_locale" id="app_locale">
                                    <option value="id" selected>
                                        {{ __('installer_messages.environment.wizard.form.env_tabs.app_locale_id_label') }}</option>
                                    <option value="en">
                                        {{ __('installer_messages.environment.wizard.form.env_tabs.app_locale_en_label') }}</option>
                                </select>
                                @if ($errors->has('app_locale'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('app_locale') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('app_fallback_locale') ? ' has-error ' : '' }}">
                                <label
                                    for="app_fallback_locale">{{ __('installer_messages.environment.wizard.form.env_tabs.fallback_locale_label') }}
                                </label>
                                <select name="app_fallback_locale" id="app_fallback_locale">
                                    <option value="id" selected>
                                        {{ __('installer_messages.environment.wizard.form.env_tabs.app_fallback_locale_id_label') }}</option>
                                    <option value="en">
                                        {{ __('installer_messages.environment.wizard.form.env_tabs.app_fallback_locale_en_label') }}</option>
                                </select>
                                @if ($errors->has('app_fallback_locale'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('app_fallback_locale') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('app_faker_locale') ? ' has-error ' : '' }}">
                                <label
                                    for="app_faker_locale">{{ __('installer_messages.environment.wizard.form.env_tabs.faker_locale_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/eloquent-factories#introduction" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <select name="app_faker_locale" id="app_faker_locale">
                                    <option value="id_ID" selected>
                                        {{ __('installer_messages.environment.wizard.form.env_tabs.app_faker_locale_id_label') }}</option>
                                    <option value="en_US">
                                        {{ __('installer_messages.environment.wizard.form.env_tabs.app_faker_locale_en_label') }}</option>
                                </select>
                                @if ($errors->has('app_faker_locale'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('app_faker_locale') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        @if(in_array($laravelVersion, [12]))
                            <div class="form-group {{ $errors->has('php_cli_server_workers') ? ' has-error ' : '' }}">
                                <label for="php_cli_server_workers">
                                    {{ __('installer_messages.environment.wizard.form.env_tabs.php_cli_server_workers_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/hashing#bcrypt-configuration" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span class="sr-only">
                                                {{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}
                                            </span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="number" name="php_cli_server_workers" id="php_cli_server_workers" value="{{ old('php_cli_server_workers', 4) }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.env_tabs.php_cli_server_workers_placeholder') }}" min="4" max="31" />
                                @if ($errors->has('php_cli_server_workers'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('php_cli_server_workers') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('bcrypt_rounds') ? ' has-error ' : '' }}">
                                <label for="bcrypt_rounds">
                                    {{ __('installer_messages.environment.wizard.form.env_tabs.bcrypt_rounds_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/hashing#bcrypt-configuration" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span class="sr-only">
                                                {{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}
                                            </span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="number" name="bcrypt_rounds" id="bcrypt_rounds" value="{{ old('bcrypt_rounds', 12) }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.env_tabs.bcrypt_rounds_placeholder') }}" min="4" max="31" />
                                @if ($errors->has('bcrypt_rounds'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('bcrypt_rounds') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('log_channel') ? ' has-error ' : '' }}">
                            <label for="log_channel">
                                {{ __('installer_messages.environment.wizard.form.env_tabs.log_channel_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/11.x/logging#writing-to-specific-channels" target="_blank"
                                        title="{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="log_channel" id="log_channel" value="{{ old('log_channel', 'stack') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.env_tabs.log_channel_placeholder') }}" />
                            @if ($errors->has('log_channel'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('log_channel') }}
                                </span>
                            @endif
                        </div>

                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('log_stack') ? ' has-error ' : '' }}">
                                <label for="log_stack">
                                    {{ __('installer_messages.environment.wizard.form.env_tabs.log_stack_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/logging#building-log-stacks" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span class="sr-only">{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="log_stack" id="log_stack" value="{{ old('log_stack', 'single') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.env_tabs.log_stack_placeholder') }}" />
                                @if ($errors->has('log_stack'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('log_stack') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('log_deprecations_channel') ? ' has-error ' : '' }}">
                            <label for="log_deprecations_channel">
                                {{ __('installer_messages.environment.wizard.form.env_tabs.log_deprecations_channel_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/11.x/logging#logging-deprecation-warnings" target="_blank"
                                        title="{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="log_deprecations_channel" id="log_deprecations_channel" value="{{ old('log_deprecations_channel', 'null') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.env_tabs.log_deprecations_channel_placeholder') }}" />
                            @if ($errors->has('log_deprecations_channel'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('log_deprecations_channel') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('log_level') ? ' has-error ' : '' }}">
                            <label for="log_level">
                                {{ __('installer_messages.environment.wizard.form.env_tabs.log_level_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/11.x/logging#log-levels" target="_blank"
                                        title="{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only">{{ __('installer_messages.environment.wizard.form.env_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="log_level" id="log_level" value="{{ old('log_level', 'debug') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.env_tabs.log_level_placeholder') }}" />
                            @if ($errors->has('log_level'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('log_level') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="buttons">
                    <button class="button" onclick="showDatabaseSettings();return false">
                        {{ __('installer_messages.environment.wizard.form.buttons.setup_database') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            {{-- Database Tab --}}
            <div class="tab" id="tab2content">

                <div class="form-group {{ $errors->has('database_connection') ? ' has-error ' : '' }}">
                    <label for="database_connection">
                        {{ __('installer_messages.environment.wizard.form.db_connection_label') }}
                    </label>
                    <select name="database_connection" id="database_connection">
                        <option value="mysql" selected>
                            {{ __('installer_messages.environment.wizard.form.db_connection_label_mysql') }}</option>
                        <option value="sqlite">
                            {{ __('installer_messages.environment.wizard.form.db_connection_label_sqlite') }}</option>
                        <option value="pgsql">
                            {{ __('installer_messages.environment.wizard.form.db_connection_label_pgsql') }}</option>
                        <option value="sqlsrv">
                            {{ __('installer_messages.environment.wizard.form.db_connection_label_sqlsrv') }}</option>
                    </select>
                    @if ($errors->has('database_connection'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_connection') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_hostname') ? ' has-error ' : '' }}">
                    <label for="database_hostname">
                        {{ __('installer_messages.environment.wizard.form.db_host_label') }}
                    </label>
                    <input type="text" name="database_hostname" id="database_hostname" value="{{ old('database_hostname', '127.0.0.1') }}"
                        placeholder="{{ __('installer_messages.environment.wizard.form.db_host_placeholder') }}" />
                    @if ($errors->has('database_hostname'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_hostname') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_port') ? ' has-error ' : '' }}">
                    <label for="database_port">
                        {{ __('installer_messages.environment.wizard.form.db_port_label') }}
                    </label>
                    <input type="number" name="database_port" id="database_port" value="{{ old('database_port', 3306) }}" placeholder="{{ __('installer_messages.environment.wizard.form.db_port_placeholder') }}" />
                    @if ($errors->has('database_port'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_port') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_name') ? ' has-error ' : '' }}">
                    <label for="database_name">
                        {{ __('installer_messages.environment.wizard.form.db_name_label') }}
                        <span id="sqlite_hint" style="color:red; font-weight: bold; display:none;">
                            *<small>
                                @if (in_array($laravelVersion, [9,10,11,12]))
                                    {{ __('installer_messages.environment.wizard.form.db_info') }}
                                @endif
                            </small>
                        </span>
                    </label>
                    <input type="text" name="database_name" id="database_name" value="{{ old('database_name') }}"
                        placeholder="{{ __('installer_messages.environment.wizard.form.db_name_placeholder') }}" />
                    @if ($errors->has('database_name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_username') ? ' has-error ' : '' }}">
                    <label for="database_username">
                        {{ __('installer_messages.environment.wizard.form.db_username_label') }}
                    </label>
                    <input type="text" name="database_username" id="database_username" value="{{ old('database_username') }}"
                        placeholder="{{ __('installer_messages.environment.wizard.form.db_username_placeholder') }}" />
                    @if ($errors->has('database_username'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_username') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('database_password') ? ' has-error ' : '' }}">
                    <label for="database_password">
                        {{ __('installer_messages.environment.wizard.form.db_password_label') }}
                    </label>
                    <input type="password" name="database_password" id="database_password" placeholder="{{ __('installer_messages.environment.wizard.form.db_password_placeholder') }}" />
                    @if ($errors->has('database_password'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('database_password') }}
                        </span>
                    @endif
                </div>

                <div class="buttons">
                    <button class="button" onclick="showApplicationSettings();return false">
                        {{ __('installer_messages.environment.wizard.form.buttons.setup_application') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            {{-- Application Tab --}}
            <div class="tab" id="tab3content">

                {{-- Session --}}
                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab1" value="null" checked />
                    <label for="appSettingsTab1">
                        <span>
                            {{ __('installer_messages.environment.wizard.form.app_tabs.session_title') }}
                        </span>
                    </label>
                    <div class="info">
                        {{-- SESSION_DRIVER=file --}}
                        @if(in_array($laravelVersion, [9, 10]))
                            <div class="form-group {{ $errors->has('session_driver') ? ' has-error ' : '' }}">
                                <label
                                    for="session_driver">{{ __('installer_messages.environment.wizard.form.app_tabs.session_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/session" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="session_driver" id="session_driver" value="{{ old('session_driver', 'file') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.session_placeholder') }}" />
                                @if ($errors->has('session_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('session_driver') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- SESSION_DRIVER=database --}}
                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('session_driver') ? ' has-error ' : '' }}">
                                <label
                                    for="session_driver">{{ __('installer_messages.environment.wizard.form.app_tabs.session_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/session" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="session_driver" id="session_driver" value="{{ old('session_driver', 'database') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.session_placeholder') }}" />
                                @if ($errors->has('session_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('session_driver') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('session_lifetime') ? ' has-error ' : '' }}">
                            <label
                                for="session_lifetime">{{ __('installer_messages.environment.wizard.form.app_tabs.session_lifetime_label') }}
                            </label>
                            <input type="text" name="session_lifetime" id="session_lifetime" value="{{ old('session_lifetime', 120) }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.session_lifetime_placeholder') }}" />
                            @if ($errors->has('session_lifetime'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('session_lifetime') }}
                                </span>
                            @endif
                        </div>

                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('session_encrypt') ? ' has-error ' : '' }}">
                                <label
                                    for="session_encrypt">{{ __('installer_messages.environment.wizard.form.app_tabs.session_encrypt_label') }}
                                </label>
                                <input type="text" name="session_encrypt" id="session_encrypt" value="{{ old('session_encrypt', 'false') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.session_encrypt_placeholder') }}" />
                                @if ($errors->has('session_encrypt'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('session_encrypt') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('session_path') ? ' has-error ' : '' }}">
                                <label
                                    for="session_path">{{ __('installer_messages.environment.wizard.form.app_tabs.session_path_label') }}
                                </label>
                                <input type="text" name="session_path" id="session_path" value="{{ old('session_path', '/') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.session_path_placeholder') }}" />
                                @if ($errors->has('session_path'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('session_path') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('session_domain') ? ' has-error ' : '' }}">
                                <label
                                    for="session_domain">{{ __('installer_messages.environment.wizard.form.app_tabs.session_domain_label') }}
                                </label>
                                <input type="text" name="session_domain" id="session_domain" value="{{ old('session_domain', 'null') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.session_domain_placeholder') }}" />
                                @if ($errors->has('session_domain'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('session_domain') }}
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Broadcasting, Filesystem, Queue, Cache, Memcached --}}
                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab2" value="null" />
                    <label for="appSettingsTab2">
                        <span>
                            {{ __('installer_messages.environment.wizard.form.app_tabs.broadcast_title') }}
                        </span>
                    </label>
                    <div class="info">
                        @if(in_array($laravelVersion, [9, 10]))
                            <div class="form-group {{ $errors->has('broadcast_driver') ? ' has-error ' : '' }}">
                                <label
                                    for="broadcast_driver">{{ __('installer_messages.environment.wizard.form.app_tabs.broadcast_driver_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/broadcasting" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="broadcast_driver" id="broadcast_driver" value="{{ old('broadcast_driver', 'log') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.broadcast_driver_placeholder') }}" />
                                @if ($errors->has('broadcast_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('broadcast_driver') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('cache_driver') ? ' has-error ' : '' }}">
                                <label
                                    for="cache_driver">{{ __('installer_messages.environment.wizard.form.app_tabs.cache_driver_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/cache" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="cache_driver" id="cache_driver" value="{{ old('cache_driver', 'file') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.cache_driver_placeholder') }}" />
                                @if ($errors->has('cache_driver'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('cache_driver') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('broadcast_connection') ? ' has-error ' : '' }}">
                                <label
                                    for="broadcast_connection">{{ __('installer_messages.environment.wizard.form.app_tabs.broadcast_connection_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/broadcasting" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="broadcast_connection" id="broadcast_connection" value="{{ old('broadcast_connection', 'log') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.broadcast_connection_placeholder') }}" />
                                @if ($errors->has('broadcast_connection'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('broadcast_connection') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('cache_store') ? ' has-error ' : '' }}">
                                <label
                                    for="cache_store">{{ __('installer_messages.environment.wizard.form.app_tabs.cache_store_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/cache" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="cache_store" id="cache_store" value="{{ old('cache_store', 'database') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.cache_store_placeholder') }}" />
                                @if ($errors->has('cache_store'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('cache_store') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('cache_prefix') ? ' has-error ' : '' }}">
                                <label
                                    for="cache_prefix">{{ __('installer_messages.environment.wizard.form.app_tabs.cache_prefix_label') }}
                                </label>
                                <input type="text" name="cache_prefix" id="cache_prefix" value="{{ old('cache_prefix') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.cache_prefix_placeholder') }}" />
                                @if ($errors->has('cache_prefix'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('cache_prefix') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('filesystem_disk') ? ' has-error ' : '' }}">
                            <label
                                for="filesystem_disk">{{ __('installer_messages.environment.wizard.form.app_tabs.filesystem_disk_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/11.x/filesystem#custom-filesystems" target="_blank"
                                        title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span
                                            class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="filesystem_disk" id="filesystem_disk" value="{{ old('filesystem_disk', 'local') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.filesystem_disk_placeholder') }}" />
                            @if ($errors->has('filesystem_disk'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('filesystem_disk') }}
                                </span>
                            @endif
                        </div>

                        {{-- QUEUE_CONNECTION=sync --}}
                        @if(in_array($laravelVersion, [9, 10]))
                            <div class="form-group {{ $errors->has('queue_connection') ? ' has-error ' : '' }}">
                                <label
                                    for="queue_connection">{{ __('installer_messages.environment.wizard.form.app_tabs.queue_connection_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/queues" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="queue_connection" id="queue_connection" value="{{ old('queue_connection', 'sync') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.queue_connection_placeholder') }}" />
                                @if ($errors->has('queue_connection'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('queue_connection') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- QUEUE_CONNECTION=database --}}
                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('queue_connection') ? ' has-error ' : '' }}">
                                <label
                                    for="queue_connection">{{ __('installer_messages.environment.wizard.form.app_tabs.queue_connection_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/queues" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="queue_connection" id="queue_connection" value="{{ old('queue_connection', 'database') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.queue_connection_placeholder') }}" />
                                @if ($errors->has('queue_connection'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('queue_connection') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('memcached_host') ? ' has-error ' : '' }}">
                            <label
                                for="memcached_host">{{ __('installer_messages.environment.wizard.form.app_tabs.memcached_host_label') }}
                                <sup>
                                    <a href="https://laravel.com/docs/11.x/memcached" target="_blank"
                                        title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span
                                            class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="memcached_host" id="memcached_host" value="{{ old('memcached_host', '127.0.0.1') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.memcached_host_placeholder') }}" />
                            @if ($errors->has('memcached_host'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('memcached_host') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Redis --}}
                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab3" value="null" />
                    <label for="appSettingsTab3">
                        <span>
                            {{ __('installer_messages.environment.wizard.form.app_tabs.redis_title') }}
                        </span>
                    </label>
                    <div class="info">
                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('redis_client') ? ' has-error ' : '' }}">
                                <label for="redis_client">
                                    {{ __('installer_messages.environment.wizard.form.app_tabs.redis_client_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/redis" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="redis_client" id="redis_client" value="{{ old('redis_client', 'phpredis') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.redis_client_placeholder') }}" />
                                @if ($errors->has('redis_client'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('redis_client') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('redis_host') ? ' has-error ' : '' }}">
                            <label for="redis_host">
                                {{ __('installer_messages.environment.wizard.form.app_tabs.redis_host_label') }}
                            </label>
                            <input type="text" name="redis_host" id="redis_host" value="{{ old('redis_host', '127.0.0.1') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.redis_host_placeholder') }}" />
                            @if ($errors->has('redis_host'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_host') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('redis_password') ? ' has-error ' : '' }}">
                            <label
                                for="redis_password">{{ __('installer_messages.environment.wizard.form.app_tabs.redis_password_label') }}</label>
                            <input type="password" name="redis_password" id="redis_password" value="null"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.redis_password_placeholder') }}" />
                            @if ($errors->has('redis_password'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_password') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('redis_port') ? ' has-error ' : '' }}">
                            <label
                                for="redis_port">{{ __('installer_messages.environment.wizard.form.app_tabs.redis_port_label') }}</label>
                            <input type="number" name="redis_port" id="redis_port" value="{{ old('redis_port', 6379) }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.redis_port_placeholder') }}" />
                            @if ($errors->has('redis_port'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('redis_port') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Mail --}}
                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab4" value="null" />
                    <label for="appSettingsTab4">
                        <span>
                            {{ __('installer_messages.environment.wizard.form.app_tabs.mail_title') }}
                        </span>
                    </label>
                    <div class="info">
                        {{-- MAIL_MAILER=smtp --}}
                        @if(in_array($laravelVersion, [9, 10]))
                            <div class="form-group {{ $errors->has('mail_mailer') ? ' has-error ' : '' }}">
                                <label for="mail_mailer">
                                    {{ __('installer_messages.environment.wizard.form.app_tabs.mail_mailer_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/mail" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="mail_mailer" id="mail_mailer" value="{{ old('mail_mailer', 'smtp') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_mailer_placeholder') }}" />
                                @if ($errors->has('mail_mailer'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_mailer') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- MAIL_MAILER=log --}}
                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('mail_mailer') ? ' has-error ' : '' }}">
                                <label for="mail_mailer">
                                    {{ __('installer_messages.environment.wizard.form.app_tabs.mail_mailer_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/mail" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="mail_mailer" id="mail_mailer" value="{{ old('mail_mailer', 'log') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_mailer_placeholder') }}" />
                                @if ($errors->has('mail_mailer'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_mailer') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        @if(in_array($laravelVersion, [12]))
                            <div class="form-group {{ $errors->has('mail_scheme') ? ' has-error ' : '' }}">
                                <label for="mail_scheme">
                                    {{ __('installer_messages.environment.wizard.form.app_tabs.mail_scheme_label') }}
                                    <sup>
                                        <a href="https://laravel.com/docs/11.x/mail" target="_blank"
                                            title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                            <span
                                                class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                        </a>
                                    </sup>
                                </label>
                                <input type="text" name="mail_scheme" id="mail_scheme" value="{{ old('mail_scheme', 'log') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_scheme_placeholder') }}" />
                                @if ($errors->has('mail_scheme'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_scheme') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- MAIL_HOST=mailhog --}}
                        @if(in_array($laravelVersion, [9]))
                            <div class="form-group {{ $errors->has('mail_host') ? ' has-error ' : '' }}">
                                <label
                                    for="mail_host">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_host_label') }}</label>
                                <input type="text" name="mail_host" id="mail_host" value="{{ old('mail_host', 'mailhog') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_host_placeholder') }}" />
                                @if ($errors->has('mail_host'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_host') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- MAIL_HOST=mailpit --}}
                        @if(in_array($laravelVersion, [10]))
                            <div class="form-group {{ $errors->has('mail_host') ? ' has-error ' : '' }}">
                                <label
                                    for="mail_host">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_host_label') }}</label>
                                <input type="text" name="mail_host" id="mail_host" value="{{ old('mail_host', 'mailpit') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_host_placeholder') }}" />
                                @if ($errors->has('mail_host'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_host') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- MAIL_HOST=1025 --}}
                        @if(in_array($laravelVersion, [9, 10]))
                            <div class="form-group {{ $errors->has('mail_port') ? ' has-error ' : '' }}">
                                <label
                                    for="mail_port">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_port_label') }}</label>
                                <input type="number" name="mail_port" id="mail_port" value="{{ old('mail_port', 1025) }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_port_placeholder') }}" />
                                @if ($errors->has('mail_port'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_port') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- MAIL_HOST=127.0.0.1 | MAIL_PORT=2525 --}}
                        @if(in_array($laravelVersion, [11, 12]))
                            <div class="form-group {{ $errors->has('mail_host') ? ' has-error ' : '' }}">
                                <label
                                    for="mail_host">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_host_label') }}</label>
                                <input type="text" name="mail_host" id="mail_host" value="{{ old('mail_host', '127.0.0.1') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_host_placeholder') }}" />
                                @if ($errors->has('mail_host'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_host') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('mail_port') ? ' has-error ' : '' }}">
                                <label
                                    for="mail_port">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_port_label') }}</label>
                                <input type="number" name="mail_port" id="mail_port" value="{{ old('mail_port', 2525) }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_port_placeholder') }}" />
                                @if ($errors->has('mail_port'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_port') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('mail_username') ? ' has-error ' : '' }}">
                            <label
                                for="mail_username">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_username_label') }}</label>
                            <input type="text" name="mail_username" id="mail_username" value="{{ old('mail_username', 'null') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_username_placeholder') }}" />
                            @if ($errors->has('mail_username'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_username') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('mail_password') ? ' has-error ' : '' }}">
                            <label
                                for="mail_password">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_password_label') }}</label>
                            <input type="text" name="mail_password" id="mail_password" value="null"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_password_placeholder') }}" />
                            @if ($errors->has('mail_password'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('mail_password') }}
                                </span>
                            @endif
                        </div>

                        @if(in_array($laravelVersion, [9, 10, 11]))
                            <div class="form-group {{ $errors->has('mail_encryption') ? ' has-error ' : '' }}">
                                <label
                                    for="mail_encryption">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_encryption_label') }}</label>
                                <input type="text" name="mail_encryption" id="mail_encryption" value="{{ old('mail_encryption', 'null') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_encryption_placeholder') }}" />
                                @if ($errors->has('mail_encryption'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_encryption') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- MAIL_FROM_ADDRESS=null --}}
                        @if(in_array($laravelVersion, [9]))
                            <div class="form-group {{ $errors->has('mail_from_address') ? ' has-error ' : '' }}">
                                <label
                                    for="mail_from_address">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_from_address_label') }}</label>
                                <input type="text" name="mail_from_address" id="mail_from_address" value="{{ old('mail_from_address', 'hello@example.com') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_from_address_placeholder') }}" />
                                @if ($errors->has('mail_from_address'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_from_address') }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- MAIL_FROM_ADDRESS="hello@example.com" --}}
                        @if(in_array($laravelVersion, [10, 11, 12]))
                            <div class="form-group {{ $errors->has('mail_from_address') ? ' has-error ' : '' }}">
                                <label
                                    for="mail_from_address">{{ __('installer_messages.environment.wizard.form.app_tabs.mail_from_address_label') }}</label>
                                <input type="text" name="mail_from_address" id="mail_from_address" value="{{ old('mail_from_address', 'hello@example.com') }}"
                                    placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.mail_from_address_placeholder') }}" />
                                @if ($errors->has('mail_from_address'))
                                    <span class="error-block">
                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('mail_from_address') }}
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                {{-- AWS --}}
                <div class="block">
                    <input type="radio" name="appSettingsTabs" id="appSettingsTab5" value="null" />
                    <label for="appSettingsTab5">
                        <span>
                            {{ __('installer_messages.environment.wizard.form.app_tabs.aws_title') }}
                        </span>
                    </label>
                    <div class="info">
                        <div class="form-group {{ $errors->has('aws_access_key_id') ? ' has-error ' : '' }}">
                            <label for="aws_access_key_id">
                                {{ __('installer_messages.environment.wizard.form.app_tabs.aws_access_key_id_label') }}
                                <sup>
                                    <a href="https://docs.aws.amazon.com/IAM/latest/UserGuide/id_credentials_access-keys.html" target="_blank"
                                        title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                        <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                        <span
                                            class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                    </a>
                                </sup>
                            </label>
                            <input type="text" name="aws_access_key_id" id="aws_access_key_id" value="{{ old('aws_access_key_id') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.aws_access_key_id_placeholder') }}" />
                            @if ($errors->has('aws_access_key_id'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_access_key_id') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('aws_secret_access_key') ? ' has-error ' : '' }}">
                            <label
                                for="aws_secret_access_key">{{ __('installer_messages.environment.wizard.form.app_tabs.aws_secret_access_key_label') }}</label>
                            <input type="text" name="aws_secret_access_key" id="aws_secret_access_key" value="{{ old('aws_secret_access_key') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.aws_secret_access_key_placeholder') }}" />
                            @if ($errors->has('aws_secret_access_key'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_secret_access_key') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('aws_default_region') ? ' has-error ' : '' }}">
                            <label
                                for="aws_default_region">{{ __('installer_messages.environment.wizard.form.app_tabs.aws_default_region_label') }}</label>
                            <input type="text" name="aws_default_region" id="aws_default_region" value="{{ old('aws_default_region', 'us-east-1') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.aws_default_region_placeholder') }}" />
                            @if ($errors->has('aws_default_region'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_default_region') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('aws_bucket') ? ' has-error ' : '' }}">
                            <label
                                for="aws_bucket">{{ __('installer_messages.environment.wizard.form.app_tabs.aws_bucket_label') }}</label>
                            <input type="text" name="aws_bucket" id="aws_bucket" value="{{ old('aws_bucket') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.aws_bucket_placeholder') }}" />
                            @if ($errors->has('aws_bucket'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_bucket') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('aws_use_path_style_endpoint') ? ' has-error ' : '' }}">
                            <label
                                for="aws_use_path_style_endpoint">{{ __('installer_messages.environment.wizard.form.app_tabs.aws_use_path_style_endpoint_label') }}</label>
                            <input type="text" name="aws_use_path_style_endpoint" id="aws_use_path_style_endpoint" value="{{ old('aws_use_path_style_endpoint', 'false') }}"
                                placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.aws_use_path_style_endpoint_placeholder') }}" />
                            @if ($errors->has('aws_use_path_style_endpoint'))
                                <span class="error-block">
                                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ $errors->first('aws_use_path_style_endpoint') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Pusher --}}
                @if(in_array($laravelVersion, [9, 10]))
                    <div class="block margin-bottom-2">
                        <input type="radio" name="appSettingsTabs" id="appSettingsTab6" value="null" />
                        <label for="appSettingsTab6">
                            <span>
                                {{ __('installer_messages.environment.wizard.form.app_tabs.pusher_title') }}
                            </span>
                        </label>
                        <div class="info">
                            @if(in_array($laravelVersion, [9, 10]))
                                <div class="form-group {{ $errors->has('pusher_app_id') ? ' has-error ' : '' }}">
                                    <label for="pusher_app_id">
                                        {{ __('installer_messages.environment.wizard.form.app_tabs.pusher_app_id_label') }}
                                        <sup>
                                            <a href="https://pusher.com/docs/server_api_guide" target="_blank"
                                                title="{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                                                <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                                <span
                                                    class="sr-only">{{ __('installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
                                            </a>
                                        </sup>
                                    </label>
                                    <input type="text" name="pusher_app_id" id="pusher_app_id" value="{{ old('pusher_app_id') }}"
                                        placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_app_id_placeholder') }}" />
                                    @if ($errors->has('pusher_app_id'))
                                        <span class="error-block">
                                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                            {{ $errors->first('pusher_app_id') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('pusher_app_key') ? ' has-error ' : '' }}">
                                    <label
                                        for="pusher_app_key">{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_app_key_label') }}</label>
                                    <input type="text" name="pusher_app_key" id="pusher_app_key" value="{{ old('pusher_app_key') }}"
                                        placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_app_key_placeholder') }}" />
                                    @if ($errors->has('pusher_app_key'))
                                        <span class="error-block">
                                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                            {{ $errors->first('pusher_app_key') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('pusher_app_secret') ? ' has-error ' : '' }}">
                                    <label
                                        for="pusher_app_secret">{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_label') }}</label>
                                    <input type="password" name="pusher_app_secret" id="pusher_app_secret" value="{{ old('pusher_app_secret') }}"
                                        placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_app_secret_placeholder') }}" />
                                    @if ($errors->has('pusher_app_secret'))
                                        <span class="error-block">
                                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                            {{ $errors->first('pusher_app_secret') }}
                                        </span>
                                    @endif
                                </div>
                            @endif

                            @if(in_array($laravelVersion, [10]))
                                <div class="form-group {{ $errors->has('pusher_host') ? ' has-error ' : '' }}">
                                    <label
                                        for="pusher_host">{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_host_label') }}</label>
                                    <input type="text" name="pusher_host" id="pusher_host" value="{{ old('pusher_host') }}"
                                        placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_host_placeholder') }}" />
                                    @if ($errors->has('pusher_host'))
                                        <span class="error-block">
                                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                            {{ $errors->first('pusher_host') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('pusher_port') ? ' has-error ' : '' }}">
                                    <label
                                        for="pusher_port">{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_port_label') }}</label>
                                    <input type="text" name="pusher_port" id="pusher_port" value="{{ old('pusher_port', 443) }}"
                                        placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_port_placeholder') }}" />
                                    @if ($errors->has('pusher_port'))
                                        <span class="error-block">
                                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                            {{ $errors->first('pusher_port') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('pusher_scheme') ? ' has-error ' : '' }}">
                                    <label
                                        for="pusher_scheme">{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_scheme_label') }}</label>
                                    <input type="text" name="pusher_scheme" id="pusher_scheme" value="{{ old('pusher_scheme', 'https') }}"
                                        placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_scheme_placeholder') }}" />
                                    @if ($errors->has('pusher_scheme'))
                                        <span class="error-block">
                                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                            {{ $errors->first('pusher_scheme') }}
                                        </span>
                                    @endif
                                </div>
                            @endif

                            @if(in_array($laravelVersion, [9, 10]))
                                <div class="form-group {{ $errors->has('pusher_app_cluster') ? ' has-error ' : '' }}">
                                    <label
                                        for="pusher_app_cluster">{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_app_cluster_label') }}</label>
                                    <input type="text" name="pusher_app_cluster" id="pusher_app_cluster" value="{{ old('pusher_app_cluster', 'mt1') }}"
                                        placeholder="{{ __('installer_messages.environment.wizard.form.app_tabs.pusher_app_cluster_placeholder') }}" />
                                    @if ($errors->has('pusher_app_cluster'))
                                        <span class="error-block">
                                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                            {{ $errors->first('pusher_app_cluster') }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="buttons">
                    <button class="button" type="submit">
                        {{ __('installer_messages.environment.wizard.form.buttons.install') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    function checkEnvironment(val) {
        var element = document.getElementById('environment_text_input');
        if (val == 'other') {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }

        // Automatically set app_debug to false if production or testing
        if (val == 'production') {
            document.getElementById('app_debug_false').checked = true;
            document.getElementById('app_debug_true').disabled = true;
        } else if (val == 'testing') {
            document.getElementById('app_debug_false').checked = true;
            document.getElementById('app_debug_true').disabled = true;
        } else {
            document.getElementById('app_debug_true').checked = true;
            document.getElementById('app_debug_true').disabled = false;
        }
    }

    function showDatabaseSettings() {
        document.getElementById('tab2').checked = true;
    }

    function showApplicationSettings() {
        document.getElementById('tab3').checked = true;
    }

    // Additional logic for database_connection sqlite
    document.addEventListener('DOMContentLoaded', function () {
    var dbSelect = document.getElementById('database_connection');
    var dbHost = document.getElementById('database_hostname');
    var dbPort = document.getElementById('database_port');
    var dbUsername = document.getElementById('database_username');
    var dbPassword = document.getElementById('database_password');

    function handleDbChange() {
        if (dbSelect.value === 'sqlite') {
            dbHost.value = '';
            dbHost.disabled = true;
            dbPort.value = '';
            dbPort.disabled = true;
            dbUsername.value = '';
            dbUsername.disabled = true;
            dbPassword.value = '';
            dbPassword.disabled = true;
            document.getElementById('sqlite_hint').style.display = 'inline';
        } else {
            dbHost.disabled = false;
            dbUsername.disabled = false;
            dbPassword.disabled = false;
            document.getElementById('sqlite_hint').style.display = 'none';

            if (dbSelect.value === 'mysql') {
                dbHost.value = '{{ old('database_hostname', '127.0.0.1') }}';
                dbPort.disabled = false;
                dbPort.value = 3306;
                dbUsername.value = '{{ old('database_username', 'root') }}';
            } else if (dbSelect.value === 'pgsql') {
                dbHost.value = '{{ old('database_hostname', '127.0.0.1') }}';
                dbPort.disabled = false;
                dbPort.value = 5432;
                dbUsername.value = '{{ old('database_username', 'root') }}';
            } else if (dbSelect.value === 'sqlsrv') {
                dbHost.value = '{{ old('database_hostname', '127.0.0.1') }}';
                dbPort.disabled = false;
                dbPort.value = 1433;
                dbUsername.value = '{{ old('database_username', 'root') }}';
            }
            dbPassword.value = '';
        }
    }

    dbSelect.addEventListener('change', handleDbChange);
        handleDbChange();
    });

    // Toggle maintenance inputs visibility
    function toggleMaintenanceInputs(selected) {
        if (selected === 'driver') {
            document.getElementById('driver_input').style.display = '';
            document.getElementById('store_input').style.display = 'none';
        } else {
            document.getElementById('driver_input').style.display = 'none';
            document.getElementById('store_input').style.display = '';
        }
    }
</script>
@endsection
