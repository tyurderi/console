<?php

namespace TM\Console;

interface StreamInterface
{

    /**
     * Write text into stream and adds a new line.
     *
     * @param string $format
     * @param array $args
     *
     * @return StreamInterface
     */
    public function out($format, $args = array());

    /**
     * Write text into stream.
     *
     * @param string $format
     * @param array  $args
     *
     * @return StreamInterface
     */
    public function inline($format, $args = array());

    /**
     * Indents stream into $count spaces.
     *
     * @param int $count
     *
     * @return StreamInterface
     */
    public function indent($count = 4);

    /**
     * Adds a new line.
     *
     * @param int $count
     *
     * @return StreamInterface
     */
    public function br($count = 1);

    /**
     * Starts a line.
     *
     * @return StreamInterface
     */
    public function sl();

    /**
     * Ends a line.
     *
     * @return StreamInterface
     */
    public function el();

}