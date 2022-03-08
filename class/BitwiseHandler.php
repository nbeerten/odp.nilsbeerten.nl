<?php
// Source: https://www.php.net/manual/en/language.operators.bitwise.php#108679

# BitwiseHandler.php

require('BitwiseFlag.php');

class BitwiseHandler extends BitwiseFlag
{
  const FLAG_STAFF = 0;
  const FLAG_PARTNER = 1;
  const FLAG_HYPESQUAD = 2;
  const FLAG_BUG_HUNTER_LEVEL_1 = 3;
  const FLAG_HYPESQUAD_BRAVERY = 6;
  const FLAG_HYPESQUAD_BRILLIANCE = 7;
  const FLAG_HYPESQUAD_BALANCE = 8;
  const FLAG_PREMIUM_EARLY_SUPPORTER = 9;
  const FLAG_TEAM_PSEUDO_USER = 10;
  const FLAG_BUG_HUNTER_LEVEL_2 = 14;
  const FLAG_VERIFIED_BOT = 16;
  const FLAG_VERIFIED_DEVELOPER = 17;
  const FLAG_CERTIFIED_MODERATOR = 18;
  const FLAG_BOT_HTTP_INTERACTIONS = 19;

  public function isStaff(){
    return $this->isFlagSet(self::FLAG_STAFF);
  }

  public function isPartner(){
    return $this->isFlagSet(self::FLAG_PARTNER);
  }

  public function isHypesquad(){
    return $this->isFlagSet(self::FLAG_HYPESQUAD);
  }

  public function isBug_Hunter_Level_1(){
    return $this->isFlagSet(self::FLAG_BUG_HUNTER_LEVEL_1);
  }

  public function isHypesquad_Bravery(){
    return $this->isFlagSet(self::FLAG_HYPESQUAD);
  }

  public function isHypesquad_Brilliance(){
    return $this->isFlagSet(self::FLAG_HYPESQUAD_BRILLIANCE);
  }

  public function isHypesquad_Balance(){
    return $this->isFlagSet(self::FLAG_HYPESQUAD_BALANCE);
  }

  public function __toString(){
    return 'User [' .
      ($this->isHypesquad_Bravery() ? 'Hypesquad Bravery' : '') .
      ($this->isHypesquad_Brilliance() ? ' Hypesquad Brilliance' : '') .
      ($this->isHypesquad_Balance() ? ' Hypesquad Balance' : '') .
    ']';
  }
}

?>