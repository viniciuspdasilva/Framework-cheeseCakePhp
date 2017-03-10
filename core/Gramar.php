<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 08/03/2017
     * Time: 15:36
     */

    namespace Core;
    use stdClass;

    class Gramar
    {

        const OPERADOR_SOMA  = '+';
        const OPERADOR_SUB   = '-';
        const OPERADOR_MULT  = '*';
        const OPERADOR_DIV   = '/';

        const OPERADOR_IGUAL = '=';
        const OPERADOR_MAIOR = '>';
        const OPERADOR_MENOR = '<';
        const OPERADOR_MENOR_IGUAL = '<=';
        const OPERADOR_MAIOR_IGUAL = '>=';
        const OPERADOR_DIFERENTE = '<>';
        const OPERADOR_IGUAL_NULL = '<=>';

        const OPERADOR_E   = 'AND';
        const OPERADOR_OU  = 'OR';
        const OPERADOR_NOT = 'NOT';
        const OPERADOR_XOR = 'XOR';
        const OPERADOR_IS_NULL  = 'IS NULL';
        const OPERADOR_NOT_NULL = 'IS NOT NULL';

        const OPERADOR_BETWEEN = 'BETWEEN';
        const OPERADOR_IN = 'IN';
        const OPERADOR_NOT_IN = 'NOT IN';
        const OPERADOR_COALESCE = 'COALESCE';
        const OPERADOR_INTERVAL = 'INTERVAL';

        const OPERADOR_ALL = 'ALL';
        const OPERADOR_DISTINT = 'DISTINT';
        const OPERADOR_GROUP_BY = 'GROUP BY';
        const OPERADOR_GROUP_BY_ASC = 'ALL';
        const OPERADOR_GROUP_BY_DESC = 'DESC';
        const OPERADOR_LIMIT = 'LIMIT';
        const OPERADOR_ORDER_BY = 'ORDER BY';
        const OPERADOR_ORDER_BY_ASC = 'ASC';
        const OPERADOR_ORDER_BY_DESC = 'DESC';

        protected $gramar; /*Define a gramatica que deverá ser utilizada, */
        protected $operadores; /*Define um array de operadores de acordo com driver utilizado*/
        protected $opr_select;


        /**
         * Gramar constructor.
         * @param string $gramar
         * @param array  $operadores
         * @param array  $opr_select
         */
        protected function  __construct ( $gramar = 'mysql')
        {
            $this->setGramar($gramar);
        }

        /**
         * @return mixed
         */
        private final function getGramar ()
        {
            return $this->gramar;
        }

        /**
         * @param mixed $gramar
         */
        private final function setGramar ( $gramar )
        {
              $this->gramar = $gramar;
        }

        /**
         * @return mixed
         */
        protected  function getOperadores ()
        {
            return $this->operadores;
        }

        /**
         * @param mixed $operadores
         */
        private final function setOperadores ( $operadores )
        {
            $this->operadores = $operadores;
        }

        /**
         * @return mixed
         */
        protected  function getOprSelect ()
        {
            return $this->opr_select;
        }

        /**
         * @param mixed $opr_select
         */
        private final function setOprSelect ( array $opr_select )
        {
           $this->opr_select = $opr_select;
        }

        protected static function excOperadores(){
            $opr[] = array(
                        'LOGICOS'       => [
                            'E'             => self::OPERADOR_E,
                            'OU'            => self::OPERADOR_OU,
                            'NOT'           => self::OPERADOR_NOT,
                            'XOR'           => self::OPERADOR_XOR,
                            'NOT_NULL'      => self::OPERADOR_NOT_NULL,
                            'IS_NULL'       => self::OPERADOR_IS_NULL
                        ],
                        'COMPARACAO'    => [
                            'IGUAL'         => self::OPERADOR_IGUAL,
                            'MAIOR'         => self::OPERADOR_MAIOR,
                            'MAIOR_IGUAL'   => self::OPERADOR_MAIOR_IGUAL,
                            'MENOR'         => self::OPERADOR_MENOR,
                            'MENOR_IGUAL'   => self::OPERADOR_MENOR_IGUAL,
                            'DIFERENTE'     => self::OPERADOR_DIFERENTE,
                            'IGUAL_NULL'    => self::OPERADOR_IGUAL_NULL

                        ],
                        'ARITMETICOS'   => [
                            'ADD'           => self::OPERADOR_SOMA,
                            'SUB'           => self::OPERADOR_SUB,
                            'MULT'          => self::OPERADOR_MULT,
                            'DIV'           => self::OPERADOR_DIV
                        ],
                        'MYSQL' => [
                            'ENTRE'         => self::OPERADOR_BETWEEN,
                            'IN'            => self::OPERADOR_IN,
                            'NOT_IN'        => self::OPERADOR_NOT_IN,
                            'COALESCE'      => self::OPERADOR_COALESCE,
                            'INTERVAL'      => self::OPERADOR_INTERVAL
                        ]
            );
            $selects = new stdClass();
            foreach ($opr as $key=>$value){
                $selects->$key = $value;
                foreach ($selects->$key as $key1 => $value1) {
                    $selects->$key1 = $value1;
                    unset($selects->$key);
                }
            }
            $selects->logico = $selects->LOGICOS;
            $selects->comparacao = $selects->COMPARACAO;
            $selects->aritmetricos = $selects->ARITMETICOS;
            $selects->mysql = $selects->MYSQL;
            return $selects;
        }
        protected  function excSelect(){
            switch (self::getGramar()){
                case 'mysql':
                    $selectOpr[] = [
                        'RESULTS' => [
                            'ALL'     => self::OPERADOR_ALL,
                            'DISTINT' => self::OPERADOR_DISTINT,
                        ],
                        'WHERE' => [
                            'GROUP_BY' => [
                                'GROUP_BY'      => self::OPERADOR_GROUP_BY,
                                'GROUP_BY_ASC'  => self::OPERADOR_GROUP_BY_ASC,
                                'GROUP_BY_DESC' => self::OPERADOR_GROUP_BY_DESC
                            ],
                            'ORDER_BY' => [
                                'ORDER_BY'      => self::OPERADOR_ORDER_BY,
                                'ORDER_BY_ASC'  => self::OPERADOR_ORDER_BY_ASC,
                                'ORDER_BY_DESC' => self::OPERADOR_ORDER_BY_DESC
                            ],
                            'LIMIT' => self::OPERADOR_LIMIT
                        ]
                    ];
                    $this->setOprSelect($selectOpr);
                    return TRUE;
                break;
            }
        }
    }