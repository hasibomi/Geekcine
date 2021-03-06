<?php
/**
 * Whoops - php errors for cool kids
 * @author Filipe Dobreira <http://github.com/filp>
 */

namespace Whoops\Exception;
use Whoops\Exception\FrameCollection;
use Whoops\Exception\ErrorException;
use Exception;

class Inspector
{
    /**
     * @var Exception
     */
    private $exception;

    /**
     * @var FrameCollection
     */
    private $frames;

    /**
     * @param Exception $exception The exception to inspect
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * @return Exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @return string
     */
    public function getExceptionName()
    {
        return get_class($this->exception);
    }

    /**
     * @return string
     */
    public function getExceptionMessage()
    {
        return $this->exception->getMessage();
    }

    /**
     * Returns an iterator for the inspected exception's
     * frames.
     * @return FrameCollection
     */
    public function getFrames()
    {
        if($this->frames === null) {
            $frames = $this->exception->getTrace();

            // If we're handling an ErrorException thrown by Whoops,
            // get rid of the last frame, which matches the handleError method,
            // and do not add the current exception to trace. We ensure that
            // the next frame does have a filename / linenumber, though.
            if($this->exception instanceof ErrorException && empty($frames[1]['line'])) {
                $frames = array($this->getFrameFromError($this->exception));
            } else {
                $firstFrame = $this->getFrameFromException($this->exception);
                array_unshift($frames, $firstFrame);
            }
            $this->frames = new FrameCollection($frames);
        }

        return $this->frames;
    }

    /**
     * Given an exception, generates an array in the format
     * generated by Exception::getTrace()
     * @param Exception $exception
     * @return array
     */
    protected function getFrameFromException(Exception $exception)
    {
        return array(
            'file'  => $exception->getFile(),
            'line'  => $exception->getLine(),
            'class' => get_class($exception),
            'args'  => array(
                $exception->getMessage()
            )
        );
    }

    /**
     * Given an error, generates an array in the format
     * generated by ErrorException
     * @param ErrorException $exception
     * @return array
     */
    protected function getFrameFromError(ErrorException $exception)
    {
        return array(
            'file'  => $exception->getFile(),
            'line'  => $exception->getLine(),
            'class' => null,
            'args'  => array()
        );
    }
}
