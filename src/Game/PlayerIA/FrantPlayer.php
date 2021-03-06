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
        // Search the most used hand in all the choices and counter it
        // + check the opponent last 3 hands and counter them if all the same
        // + change stategy if lose too much
        $rock = 0;
        $paper = 0;
        $scissors = 0;
        $loses = 0;
        $choices = $this->result->getChoicesFor($this->opponentSide);
        // Get the last 3 hands, if they are the same counter them
        $nbRound = (int) $this->result->getNbRound();
        if ($nbRound > 2 && $choices[$nbRound - 1] == $choices[$nbRound - 2] &&
            $choices[$nbRound - 2] == $choices[$nbRound - 3]) {

          if ($choices[$nbRound - 1] == parent::rockChoice()) {
            return parent::paperChoice();
          }
          elseif ($choices[$nbRound - 1] == parent::paperChoice()) {
            return parent::scissorsChoice();
          }
          elseif ($choices[$nbRound - 1] == parent::scissorsChoice()) {
            return parent::rockChoice();
          }
        }

        // Search in all the hands
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

        return parent::paperChoice();

    }

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

};
