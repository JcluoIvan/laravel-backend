<?php


if (!function_exists('artisan')) {

    function artisan($cmd = '')
    {
        $cmds = explode(' ', $cmd);
        array_unshift($cmds, 'artisan');
        $kernel = app()->make(Illuminate\Contracts\Console\Kernel::class);

        $fp = fopen('php://output', 'w');
        $status = $kernel->handle(
            new Symfony\Component\Console\Input\ArgvInput($cmds),
            new Symfony\Component\Console\Output\StreamOutput($fp)
        );
        $content = ob_get_contents();
        ob_end_clean();
        fclose($fp);
        if ($status) {
            throw new Error($content);
        }

        return $content;
    }
}
