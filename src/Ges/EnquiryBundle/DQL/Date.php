<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nishantha.weerakoon
 * Date: 4/06/13
 * Time: 8:52 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Ges\EnquiryBundle\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * DateFunction ::= "DATE" "(" ArithmeticPrimary ")"
 * @package Ges\EnquiryBundle\DQL
 */
class Date extends FunctionNode {

    public $dateExpression = null;
    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     *
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'DATE('.$this->dateExpression->dispatch($sqlWalker).')';
    }

    /**
     * @param \Doctrine\ORM\Query\Parser $parser
     *
     * @return void
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER); //Match 'DATE'
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->dateExpression = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}