<?php
// Source: https://www.php.net/manual/en/language.operators.bitwise.php#108679

# BitwiseHandler.php

class BitwiseHandler {
    const FLAG_STAFF = 1;
    const FLAG_PARTNER = 2;
    const FLAG_HYPESQUAD = 4;
    const FLAG_BUG_HUNTER_LEVEL_1 = 8;
    const FLAG_HYPESQUAD_BRAVERY = 6;
    const FLAG_HYPESQUAD_BRILLIANCE = 128;
    const FLAG_HYPESQUAD_BALANCE = 256;
    const FLAG_PREMIUM_EARLY_SUPPORTER = 512;
    const FLAG_TEAM_PSEUDO_USER = 1024;
    const FLAG_BUG_HUNTER_LEVEL_2 = 16384;
    const FLAG_VERIFIED_BOT = 65536;
    const FLAG_VERIFIED_DEVELOPER = 131072;
    const FLAG_CERTIFIED_MODERATOR = 262144;
    const FLAG_BOT_HTTP_INTERACTIONS = 524288;
        
    protected function isFlagSet($api, $flag) {
        return (($api & $flag) == $flag);
    }

    public function isStaff($api) {
        return $this->isFlagSet($api, self::FLAG_STAFF);
    }

    public function isPartner($api) {
        return $this->isFlagSet($api, self::FLAG_PARTNER);
    }

    public function isHypesquad($api) {
        return $this->isFlagSet($api, self::FLAG_HYPESQUAD);
    }

    public function isBug_Hunter_Level_1($api) {
        return $this->isFlagSet($api, self::FLAG_BUG_HUNTER_LEVEL_1);
    }

    public function isHypesquad_Bravery($api) {
        return $this->isFlagSet($api, self::FLAG_HYPESQUAD_BRAVERY);
    }

    public function isHypesquad_Brilliance($api) {
        return $this->isFlagSet($api, self::FLAG_HYPESQUAD_BRILLIANCE);
    }

    public function isHypesquad_Balance($api) {
        return $this->isFlagSet($api, self::FLAG_HYPESQUAD_BALANCE);
    }

    public function isPremium_Early_Supporter($api) {
        return $this->isFlagSet($api, self::FLAG_PREMIUM_EARLY_SUPPORTER);
    }

    public function isTeam_Pseudo_User($api) {
        return $this->isFlagSet($api, self::FLAG_TEAM_PSEUDO_USER);
    }

    public function isBug_Hunter_Level_2($api) {
        return $this->isFlagSet($api, self::FLAG_BUG_HUNTER_LEVEL_2);
    }

    public function isVerified_Bot($api) {
        return $this->isFlagSet($api, self::FLAG_VERIFIED_BOT);
    }

    public function isVerified_Developer($api) {
        return $this->isFlagSet($api, self::FLAG_VERIFIED_DEVELOPER);
    }

    public function isCertified_Moderator($api) {
        return $this->isFlagSet($api, self::FLAG_CERTIFIED_MODERATOR);
    }

    public function isBOT_HTTP_INTERACTIONS($api) {
        return $this->isFlagSet($api, self::FLAG_BOT_HTTP_INTERACTIONS);
    }

    public function get($api) {
        $userflags = [
            ($this->isStaff($api) ? 'STAFF' : null) ,
            ($this->isPartner($api) ? 'PARTNER' : null) ,
            ($this->isHypesquad($api) ? 'HYPESQUAD' : null) ,
            ($this->isBug_Hunter_Level_1($api) ? 'BUG_HUNTER_LEVEL_1' : null) ,
            ($this->isHypesquad_Bravery($api) ? 'HYPESQUAD_BRAVERY' : null) ,
            ($this->isHypesquad_Brilliance($api) ? 'HYPESQUAD_BRILLIANCE' : null) ,
            ($this->isHypesquad_Balance($api) ? 'HYPESQUAD_BALANCE' : null) ,
            ($this->isPremium_Early_Supporter($api) ? 'PREMIUM_EARLY_SUPPORTER' : null) ,
            ($this->isTeam_Pseudo_User($api) ? 'TEAM_PSEUDO_USER' : null) ,
            ($this->isBug_Hunter_Level_2($api) ? 'FLAG_BUG_HUNTER_LEVEL_2' : null) ,
            ($this->isVerified_Developer($api) ? 'VERIFIED_DEVELOPER' : null) ,
            ($this->isCertified_Moderator($api) ? 'CERTIFIED_MODERATOR' : null) ,
            ($this->isBOT_HTTP_INTERACTIONS($api) ? 'BOT_HTTP_INTERACTIONS' : null) ,
            ];
        return $userflags;
    }
}
?>