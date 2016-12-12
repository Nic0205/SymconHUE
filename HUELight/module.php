<?php

require_once(__DIR__ . "/../HUEDevice.php");

class HUELight extends HUEDevice {

  public function Create() {
    parent::Create();
    $this->RegisterPropertyInteger("LightId", 0);
    $this->RegisterPropertyString("Type", "");
    $this->RegisterPropertyInteger("LightFeatures", 0); // 0=HUE+CT, 1=HUE, 2=CT, 3=BRI
    $this->RegisterPropertyString("ModelId", "");
    $this->RegisterPropertyString("UniqueId", "");

    if (!IPS_VariableProfileExists('ColorModeSelect.Hue')) IPS_CreateVariableProfile('ColorModeSelect.Hue', 1);
    IPS_SetVariableProfileAssociation('ColorModeSelect.Hue', 0, 'Farbe', '', 0x000000);
    IPS_SetVariableProfileAssociation('ColorModeSelect.Hue', 1, 'Farbtemperatur', '', 0x000000);
  }

  protected function BasePath() {
    $id = $this->ReadPropertyInteger("LightId");
    return "/lights/$id";
  }

}
