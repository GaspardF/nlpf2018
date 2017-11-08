<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class FrantPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class FrantPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        // First basic program in case of emergency push
        //$choice = parent::rockChoice();

        // Random (for test)
        /*$number = mt_rand(1, 3);
        $choice = ($number == 1) ?  parent::rockChoice() :
        (($number == 2) ? parent::paperChoice() : parent::scissorsChoice());*/


        // Search the most used hand in all the choices and counter it
        $rock = 0;
        $paper = 0;
        $scissors = 0;
        $choices = $this->result->getChoicesFor($this->opponentSide);
        foreach ($choices as $c) {
          if ($c == parent::rockChoice()) {
            $rock++;
          }
          elseif ($c == parent::paperChoice()) {
            $paper++;
          }
          elseif ($c == parent::scissorsChoice()) {
            $scissors++;
          }
        }
        if ($rock > $paper && $rock > $scissors) {
          return parent::paperChoice();
        }
        elseif ($paper > $rock && $paper > $scissors) {
          return parent::scissorsChoice();
        }
        elseif ($scissors > $rock && $scissors > $paper) {
          return parent::rockChoice();
        }

        return parent::rockChoice();
    }
};
