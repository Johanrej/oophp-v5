<?php

namespace Jorj\Guess;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     * @var bool $correct True if answer is correct.
     */
    private $number;
    private $tries;
    private $correct;


    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */
    public function __construct(int $number = -1, int $tries = 6, bool $correct = false)
    {
        if ($number == -1) {
            $this->number = $this->random();
            $this->tries = $tries;
            $this->correct = $correct;
        }
    }


    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */
    public function random()
    {
        return rand(1, 100);
    }


    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    public function tries()
    {
        return $this->tries;
    }


    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    public function number()
    {
        return $this->number;
    }


    /**
     * Get the result string.
     *
     * @return string as the result.
     */
    public function result()
    {
        return $this->res;
    }


    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */
    public function makeGuess(int $guess)
    {
        if ($this->correct == true) {
            return "You already won! Start a new game instead!";
        } else {
            if ($this->tries > 0) {
                $this->tries -= 1;
            } else {
                $this->tries = 0;
            }

            if ($this->tries > 0) {
                if ($guess < 1 || $guess > 100) {
                    throw new GuessException("You lost a try. You have to choose a number between 1 and 100.");
                }

                if ($guess == $this->number) {
                    $this->correct = true;
                    return "The answer is correct! You won!";
                } elseif ($guess > $this->number) {
                    return "The number is too high!";
                } else {
                    return "The number is too low!";
                }
            } else {
                return "GAME OVER! You lost!";
            }
        }
    }
}
