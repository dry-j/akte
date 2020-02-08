<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: Jörg Droste
 * The Initial Developer of the Original Code is Jörg Droste.
 * All Rights Reserved.
 * If you have any questions or comments, please email: info@j-droste.de
 ************************************************************************************/
 
 class Akten_List_View extends Vtiger_Index_View {

        public function process(Vtiger_Request $request) {
                $viewer = $this->getViewer($request);
                $viewer->view('List.tpl', $request->getModule());
        }

}
