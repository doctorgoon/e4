@extends('templates.layout-mirfrance')

@section('title')
    Télécharger les logiciels et drivers MIR
@endsection

@section('content')
    @if(isset($logged) && $logged == true)
        <table>
            <tbody>
            <tr>
                <td style="width: 90px; text-align: center;"><img alt="WspPro" src="/imgs/_mirfrance/wspPro.jpg"></td>
                <td style="padding: 10px;">
                    <div><span style="font-size: 19px; font-weight: bold;">Winspiro PRO</span> -
                        <span class="link_blue" style="font-size: 15px;"><a href="http://www.Spirometry.com/download.asp?path=MIRwinspiroPRO/setup.zip">Télécharger Winspiro PRO</a></span> <!--/ <a id="under_link_1" href="javascript:showLink(1);"> + plus de d&eacute;tails</a>
            <div style="display: none;" id="link_1">http://www.Spirometry.com/download.asp?path=MIRwinspiroPRO/setup.zip</div>-->
                        <br><br><i>Compatible avec tous les appareils MIR sauf Minispir Light et Spirobank USB / Office</i>
                        <!--<table border="0" width="100%;">
                            <tr style="text-align: center;">
                                <td><img src="/images/appareils/minispirnew.png" style="height: 50px;" /></td>
                                <td><img src="/images/appareils/spirobank2base.png" style="height: 50px;" /></td>
                                <td><img src="/images/appareils/spirobank2adv.png" style="height: 50px;" /></td>
                                <td><img src="/images/appareils/spirobankgusb.png" style="height: 50px;" /></td>
                                <td><img src="/images/appareils/spirodocoxy.png" style="height: 50px;" /></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td>Minispir</td>
                                <td>Spirobank II Base</td>
                                <td>Spirobank II Advanced / +</td>
                                <td>Spirobank G USB</td>
                                <td>Spirodoc (Oxy / Spiro)</td>
                        </table>-->
                    </div>
                </td>
            </tr>
            <!--<tr>
                <td style="width: 90px; text-align: center;"><img alt="WspProNET" src="images/uploaded/mirfrance_com/wsp/wspProNET.jpg" /></td>
                <td style="padding: 10px;">
                <div><span style="font-size: 19px; font-weight: bold;">WinspiroPRO Network</span> (always the last version available)</div>
                <div class="link_blue" style="font-size: 15px;"><a href="http://www.spirometry.com/download.asp?path=MIRwinspiroPRO_NET/setup.zip">T&eacute;l&eacute;charger Winspiro Network</a> / <a id="under_link_2" href="javascript:showLink(2);"> + plus de d&eacute;tails</a>
                <div style="display: none;" id="link_2">http://www.spirometry.com/download.asp?path=MIRwinspiroPRO_NET/setup.zip</div>
                </div>
                </td>
            </tr>-->
            <tr>
                <td style="width: 90px; text-align: center;"><img alt="WspProEXP" src="/imgs/_mirfrance/wspPro.jpg"></td>
                <td style="padding: 10px;">
                    <img src="/imgs/_mirfrance/spirobankoffice.png" style="float: right; height: 60px;">
                    <div><span style="font-size: 19px; font-weight: bold;">Winspiro EXPRESS</span> -
                        <!-- http://www.spirometry.com/download.asp?path=winspiroexpress/setup.zip -->
                        <span class="link_blue" style="font-size: 15px;"><a href="http://www.spirometry.com/download.asp?path=winspiroexpress/setup.zip">Télécharger Winspiro EXPRESS</a><!--/ <a id="under_link_3" href="javascript:showLink(3);"> + plus de d&eacute;tails</a>--></span>
                        <div style="display: none;" id="link_3">http://www.spirometry.com/download.asp?path=winspiroexpress/setup.zip</div>
                        <br><br><i>Compatible seulement avec le Spirobank Office (USB)</i>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 90px; text-align: center;"><img alt="WspLight" src="/imgs/_mirfrance/wspLight.jpg"></td>
                <td style="padding: 10px;">
                    <img src="/imgs/_mirfrance/minispirlight.png" style="float: right; height: 60px;">
                    <div><span style="font-size: 19px; font-weight: bold;">Winspiro LIGHT</span>  -
                        <span class="link_blue" style="font-size: 15px;"><a href="http://www.Spirometry.com/download.asp?path=winspiroLIGHT/setup.zip">Télécharger Winspiro LIGHT</a></span><!--/ <a id="under_link_4" href="javascript:showLink(4);"> + plus de d&eacute;tails</a>-->
                        <div style="display: none;" id="link_4">http://www.Spirometry.com/download.asp?path=winspiroLIGHT/setup.zip</div>
                        <br><br><i>Compatible seulement avec le Minispir LIGHT</i>
                    </div>
                </td>
            </tr>
            <!-- <tr>
            <td style="width: 90px; text-align: center;"><img alt="MirtelUploader" src="/images/uploaded/mirfrance_com/wsp/mirtelUploader.png" /></td>
            <td style="padding: 10px;">
            <div><span style="font-size: 19px; font-weight: bold;">Mirtel Uploader</span></div>
            <div class="link_blue" style="font-size: 15px;"><a href="http://upload.lamirau.com/winspiro/MirtelUploader.exe">T&eacute;l&eacute;charger Mirtel Uploader</a> / <a id="under_link_5" href="javascript:showLink(5);"> + plus de d&eacute;tails</a>
            <div style="display: none;" id="link_5">http://upload.lamirau.com/winspiro/MirtelUploader.exe</div>
            </div>
            </td>
        </tr>
		<tr>
            <td style="width: 90px; text-align: center;"><img alt="SocketLamirau" src="/images/uploaded/mirfrance_com/wsp/socketLamirau.png" style="height: 50px;" /></td>
            <td style="padding: 10px;">
            <div><span style="font-size: 19px; font-weight: bold;">Socket Lamirau Uploader</span></div>
            <div class="link_blue" style="font-size: 15px;"><a href="http://upload.lamirau.com/winspiro/setup_socketLamirauUploader.exe">T&eacute;l&eacute;charger Socket Lamirau Uploader</a> / <a id="under_link_5" href="javascript:showLink(6);"> + plus de d&eacute;tails</a>
            <div style="display: none;" id="link_6">http://upload.lamirau.com/winspiro/setup_socketLamirauUploader.exe</div>
            </div>
            </td>
        </tr>
        <tr>
            <td style="width: 90px; text-align: center;"><img alt="Pilotes" src="/images/uploaded/mirfrance_com/wsp/pilotes.png" /></td>
            <td style="padding: 10px;">
            <div><span style="font-size: 19px; font-weight: bold;">Drivers MIR (toutes plateformes)</span></div>
            <div class="link_blue" style="font-size: 15px;"><a href="http://upload.lamirau.com/winspiro/MIR driver 32bit WinXP.msi">T&eacute;l&eacute;charger le driver pour Windows XP</a><br />
            <a href="http://upload.lamirau.com/winspiro/MirUSB_32bitVistaSeven.exe">T&eacute;l&eacute;charger le driver pour Windows Vista, 7 et 8 (32 bits)</a><br />
            <a href="http://upload.lamirau.com/winspiro/MirUSB_64bitVistaSeven.exe">T&eacute;l&eacute;charger le driver pour Windows Vista, 7 et 8 (64 bits)</a></div>
            </td>
        </tr>
        <tr>
            <td style="width: 90px; text-align: center;"><img alt="Firmware" src="/images/uploaded/mirfrance_com/wsp/binaire.png" /></td>
            <td style="padding: 10px;">
            <div><span style="font-size: 19px; font-weight: bold;">Firmwares</span></div>
            <div class="link_blue" style="font-size: 15px;"><a href="http://upload.lamirau.com/winspiro/spirotel_ver35_EN-IT-DE-FR-ES_M_W.tsk">T&eacute;l&eacute;charger le firmware du Spirotel I (V 3.5)</a><br />
            <a href="http://upload.lamirau.com/winspiro/usb_serial_converter_get_version.exe">T&eacute;l&eacute;charger le firmware de l'uploader du Spirotel</a><br />
            <a href="http://upload.lamirau.com/winspiro/spirotel_ver15_EN-IT-FR-FR2-ES-DE_M_W@014.tsk">T&eacute;l&eacute;charger le dernier firmware du Spirotel II</a><br />
            <a href="http://upload.lamirau.com/winspiro/apn_mir_18.apn">T&eacute;l&eacute;charger le dernier APN du Spirotel II</a></div>
            </td>
        </tr>-->
            <tr>
                <td style="width: 90px; text-align: center;"><img alt="Librairies" src="/imgs/_mirfrance/librairies.png"></td>
                <td style="padding: 10px;">
                    <div><span style="font-size: 19px; font-weight: bold;">Autres librairies</span></div>
                    <div class="link_blue" style="font-size: 15px;"><a href="http://www.microsoft.com/download/en/details.aspx?id=8328">Télécharger Visual C++ V10 SP1 32 bits</a><br>
                        <a href="http://www.microsoft.com/download/en/details.aspx?id=13523">Télécharger Visual C++ V10 SP1 64 bits</a><br>
                        <a href="http://upload.lamirau.com/winspiro/soapsdk.exe">Télécharger le SOAP SDK</a></div>
                </td>
            </tr>
            <!--<tr>
                <td style="width: 90px; text-align: center;"><img alt="Librairies" src="/images/uploaded/mirfrance_com/wsp/apple_bluetooth.jpg" style="width: 48px;" /></td>
                <td style="padding: 10px;">
                <div><span style="font-size: 19px; font-weight: bold;">Drivers Bluetooth Apple pour Parallels Desktop</span></div>
                <div class="link_blue" style="font-size: 15px;">
                    <a href="//upload.lamirau.com/winspiro/DriversBluetoothAppleParallelsDesktop.zip">T&eacute;l&eacute;charger les drivers (32 bits et 64 bits)</a>
                </div>
                </td>
            </tr>-->
            </tbody>
        </table>
    @else
        {!! Form::open() !!}

        <p>
            {!! Form::label('password', 'Merci d\'entrer le mot de passe d\'accès') !!}
            {!! Form::password('password', null) !!}
        </p>

        <p>
            {!! Form::submit('Accéder aux téléchargements') !!}
        </p>
        {!! Form::close() !!}
    @endif
@stop