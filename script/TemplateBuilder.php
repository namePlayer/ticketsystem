<?php


class TemplateBuilder
{

    public function render(string $name, array $arguments = []) {
        ob_start();

        extract($arguments);

        include(TEMPLATE_DIR . 'element/' . $name . '.php');

        echo ob_get_clean();
    }

    public function renderMessages(array $messages = []) {
        $messageOutput = '';
        foreach ($messages as $message) {
            $singleMessage = ['type' => $message['type'], 'message' => $message['message']];
            $messageOutput .= $this->render('alert', $singleMessage);
        }

        return $messageOutput;
    }
}