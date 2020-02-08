class Auftragsakten_UninstallAuftragsakten_Action extends Settings_Vtiger_Basic_Action {

    function __construct() {
        parent::__construct();
    }

    function process(Vtiger_Request $request) {

        $Vtiger_Utils_Log = true;
        include_once('vtlib/Vtiger/Module.php');
        $adb = PearDatabase::getInstance();
        $module = Vtiger_Module::getInstance('Auftragsakten');
        if ($module) {
            
            $module->delete();
            @shell_exec('rm -r modules/Auftragsakten');
            @shell_exec('rm -r layouts/vlayout/modules/Auftragsakten');
            @shell_exec('rm -f languages/de_de/Auftragsakten.php');
            @shell_exec('rm -f languages/en_us/Auftragsakten.php');

            $adb->pquery("DROP TABLE IF EXISTS vtiger_auftragsakten", array());
            $adb->pquery("DROP TABLE IF EXISTS vtiger_auftragsakten_settings", array());

           $result = array('success' => true);
        } else {
            $result = array('success' => false);
        }
        ob_clean();
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    }
}
