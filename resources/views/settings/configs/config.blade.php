@extends('layouts.app', ['title' => 'Configuration'])

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Application Configuration Settings</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>General Application Settings</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" action="{{ action('SettingsController@post_config') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Application URL
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="app_url" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.APP_URL') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Application Debugging
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="app_debug" class="form-control col-md-7 col-xs-12">
                                <option>true</option>
                                <option{{ (config('fiercephish.APP_DEBUG')?'':' selected') }}>false</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Application Timezone
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="app_timezone" class="form-control col-md-7 col-xs-12" id="applcation_timezone">
                            @foreach (timezone_identifiers_list() as $timezone)
                                <option{{ (config('fiercephish.APP_TIMEZONE')==$timezone)?' selected':''}}>{{ $timezone }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Testing mode 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select title="If this is true, no emails will be sent by FiercePhish" name="test_email_job" class="form-control col-md-7 col-xs-12 tt">
                                <option>true</option>
                                <option{{ (config('fiercephish.TEST_EMAIL_JOB')?'':' selected') }}>false</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">FiercePhish Prefix
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input title="This is the prefix to each URL path of FiercePhish" type="text" name="uri_prefix" class="form-control col-md-7 col-xs-12 tt" value="{{ config('fiercephish.URI_PREFIX') }}">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Save Settings</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Email Settings</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" action="{{ action('SettingsController@post_config') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">BCC All Emails
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input title="All emails sent by FiercePhish will be BCC'd to this email address" type="text" name="mail_bcc_all" class="form-control col-md-7 col-xs-12 tt" value="{{ config('fiercephish.MAIL_BCC_ALL') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mail Configuration
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="mail_driver" id="MAIL_DRIVER" class="form-control col-md-7 col-xs-12">
                                <option value="smtp"{{ (config('fiercephish.MAIL_DRIVER')=='smtp'?' selected':'') }}>SMTP</option>
                                <option value="mailgun"{{ (config('fiercephish.MAIL_DRIVER')=='mailgun'?' selected':'') }}>Mailgun</option>
                            </select>
                        </div>
                    </div>
                    <div class="conditional_settings" id="smtp_settings" style="display: none;">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Host
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="mail_host" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.MAIL_HOST') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Port
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="mail_port" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.MAIL_PORT') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Username
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="mail_username" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.MAIL_USERNAME') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Password
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="mail_password" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.MAIL_PASSWORD') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Encryption Type
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="mail_encryption" class="form-control col-md-7 col-xs-12">
                                    <option value=""{{ (config('fiercephish.MAIL_ENCRYPTION')==''?' selected':'') }}>None</option>
                                    <option value="tls"{{ (config('fiercephish.MAIL_ENCRYPTION')=='tls'?' selected':'') }}>TLS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="conditional_settings" id="mailgun_settings" style="display: none;">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mailgun Domain
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="mailgun_domain" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.MAILGUN_DOMAIN') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mailgun Secret API
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="mailgun_secret" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.MAILGUN_SECRET') }}">
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Save Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>IMAP Inbox Settings</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" action="{{ action('SettingsController@post_config') }}">
                    <div style="text-align: center;" class="form-group">
                        @if (\Cache::has('fp:checkmail_error') && \Cache::get('fp:checkmail_error',0) >= 10)
                            <span style="color: #FF0000;">INBOX feature has been disabled because of too many connection errors! Edit the settings below to reenable it.</span><br /><br />
                        @endif
                        
                        Set this if you want to use the INBOX feature of FiercePhish.<br />
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">IMAP Host
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="imap_host" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.IMAP_HOST') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">IMAP Port
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="imap_port" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.IMAP_PORT') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">IMAP Username
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="imap_username" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.IMAP_USERNAME') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">IMAP Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="imap_password" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.IMAP_PASSWORD') }}">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Save Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Database Settings</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" action="{{ action('SettingsController@post_config') }}">
                    <div style="text-align: center; color: #FF0000;" class="form-group">
                        Careful when editing these settings. If you mess up, you'll have to manually edit "{{ base_path('.env') }}"
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Database Type
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="db_connection" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.DB_CONNECTION') }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Database Host
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="db_host" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.DB_HOST') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Database Port
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="db_port" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.DB_PORT') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Database Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="db_database" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.DB_DATABASE') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Database Username
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="db_username" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.DB_USERNAME') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Database Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="db_password" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.DB_PASSWORD') }}">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Save Settings</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        
        <div class="x_panel">
            <div class="x_title">
                <h2>Proxy / Load Balancer Settings</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" action="{{ action('SettingsController@post_config') }}">
                    <div style="text-align: center;" class="form-group">
                        Set these settings if FiercePhish is located behind a proxy or load balancer.<br />
                        Careful when editing these settings. If you mess up, you'll have to manually edit "{{ base_path('.env') }}"<br />
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Proxy URL
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input title="Example: http://firephish.example.com/" type="text" name="proxy_url" class="form-control col-md-7 col-xs-12 tt" value="{{ config('fiercephish.PROXY_URL') }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Proxy Schema
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="proxy_schema" class="form-control col-md-7 col-xs-12">
                                    <option value=""{{ (config('fiercephish.PROXY_SCHEMA')==''?' selected':'') }}>None</option>
                                    <option value="http"{{ (config('fiercephish.PROXY_SCHEMA')=='tls'?' selected':'') }}>HTTP</option>
                                    <option value="https"{{ (config('fiercephish.PROXY_SCHEMA')=='tls'?' selected':'') }}>HTTPS</option>
                                </select>
                            </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Save Settings</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Notification Settings</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" action="{{ action('SettingsController@post_config') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">From Email Address
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="notifications_from" class="form-control col-md-7 col-xs-12" value="{{ config('fiercephish.NOTIFICATIONS_FROM') }}" />
                        </div>
                    </div>
                    <div style="text-align: center;" class="form-group">
                        Should the notifications contain a link in it to automatically log you in to view the alert?<br />
                        This is useful for text message notifications if you don't want to go through the trouble of<br />
                        logging in, but obviously it is less secure if your phone/email is compromised.
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Include Login Link
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="notifications_login_link" class="form-control col-md-7 col-xs-12" title="">
                                    <option value="false"{{ (config('fiercephish.NOTIFICATIONS_LOGIN_LINK')===false?' selected':'') }}>No</option>
                                    <option value="true"{{ (config('fiercephish.NOTIFICATIONS_LOGIN_LINK')==true?' selected':'') }}>Yes</option>
                                </select>
                            </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Save Settings</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')
<script type="text/javascript">
    /* global $ */
    function select_mail_settings()
    {
        $(".conditional_settings").css('display', 'none');
        $("#"+$("#MAIL_DRIVER").val()+"_settings").css('display', 'block');
    }

    $("#MAIL_DRIVER").change(select_mail_settings);
    
    $(document).ready(function() {
        select_mail_settings();
        $("#applcation_timezone").select2({
            placeholder: "Select a Timezone",
            allowClear: false
          });
        $("button").click(function() {
           $("#loading_modal").modal({
                show: true,
                keyboard: false,
                backdrop: 'static'
              }); 
        });
    });
</script>
@endsection