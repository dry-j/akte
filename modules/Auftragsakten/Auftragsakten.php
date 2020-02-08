<?php
include_once('vtlib/Vtiger/Module.php');
include_once('vtlib/Vtiger/Event.php');

/**
 * Module class definition
 */
class Auftragsakten {}


$moduleInstance = Vtiger_Module::getInstance('ModuleName');
$moduleInstance->addLink(<DETAILVIEWWIDGET>, <aUFTRAGSAKTEN>, <tESTAKTE>);



    /**
     * Invoked when special actions are performed on the module.
     *
     * @param String Module name
     * @param String Event Type
     */
    function vtlib_handler($moduleName, $eventType) {

        echo "<h1>Module installed</h1>";

        if($eventType == 'module.postinstall') {
            // TODO add relevant code here

            echo "Module postinstall";
        }

        if ($eventType == 'module.enabled') {

            // Register an event handler for the Accounts module for the aftersave event
            $AccountsInstance = Vtiger_Module::getInstance('Accounts');
            Vtiger_Event::register($AccountsInstance, 'vtiger.entity.aftersave', 'AuftragsaktenHandler', 'modules/Auftragsakten/Auftragsakten.php');

            echo "Module enabled";
        }

      
       if($eventType == 'module.disabled') {
            // TODO add relevant code here

            echo "Module disabled";
        }

        if ($eventType == 'module.disabled') {

            // Register an event handler for the Accounts module for the aftersave event
            $AccountsInstance = Vtiger_Module::getInstance('Accounts');
            Vtiger_Event::unregister($AccountsInstance, 'vtiger.entity.aftersave', 'AuftragsaktenHandler', 'modules/Auftragsakten/Auftragsakten.php');

            echo "Module enabled";
        }
        /*
         * Event types you can use
         *
         * module.enabled - Handle actions when this module is enabled.
         * module.disabled - Handle actions when this module is disabled.
         * module.preuninstall - Handle actions when this module is about to be deleted.
         * module.preupdate - Handle actions before this module is updated.
         * module.postupdate - Handle actions after this module is updated.
         */

    }

}

 
