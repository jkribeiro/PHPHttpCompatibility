<?php
/**
 * PHPHttpCompatibility_Sniffs_Http_ForbiddenClassesSniff.
 *
 * PHP version 5
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @link     http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Discourage the use of 1.x API Classes.
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @link     http://pear.php.net/package/PHP_CodeSniffer
 */
class PHPHttpCompatibility_Sniffs_Http_ForbiddenClassesSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * A list of deprecated classes.
     *
     * @var array(string)
     */
    public $forbiddenClasses = array(
                                     'HttpDeflateStream',
                                     'HttpInflateStream',
                                     'HttpMessage',
                                     'HttpQueryString',
                                     'HttpRequest',
                                     'HttpRequestPool',
                                     'HttpResponse',
                                    );

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
      return array(
        T_NEW,
        T_STRING,
      );

    }//end register()

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in
     *                                        the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
      $tokens = $phpcsFile->getTokens();

      // If it is a new object instance of a class.
      if ($tokens[$stackPtr]['code'] == T_NEW) {
        $className = $tokens[$stackPtr + 2]['content'];

        if (in_array($className, $this->forbiddenClasses)) {
          $this->addError($phpcsFile, $stackPtr, $className);
        }
      }

      // If it is a static public method/variable of a class.
      if ($tokens[$stackPtr]['code'] == T_STRING && $tokens[($stackPtr + 1)]['code'] == T_DOUBLE_COLON) {
        $className = $tokens[$stackPtr]['content'];

        if (in_array($className, $this->forbiddenClasses)) {
          $this->addError($phpcsFile, $stackPtr, $className);
        }
      }
    }//end process()

    /**
     * Generates the error for this sniff.
     *
     * @param PHP_CodeSniffer_File $phpcsFile   The file being scanned.
     * @param int                  $stackPtr    The position of the forbidden function
     *                                          in the token array.
     * @param string               $className  The name of the forbidden function.
     *
     * @return void
     */
    protected function addError($phpcsFile, $stackPtr, $className)
    {
      $error = 'The use of class "%s()" is forbidden for HTTP extension Version 2 ';

      $phpcsFile->addError($error, $stackPtr, 'Found', $className);

    }//end addError()

}//end class

?>
