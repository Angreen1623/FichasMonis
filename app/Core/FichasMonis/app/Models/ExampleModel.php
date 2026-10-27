<?php

class ExampleModel
{
    public function getData(): array
    {
        // Simulating data retrieval from a database or other source
        return [
            'name' => 'Example Name',
            'description' => 'This is an example description.',
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }
}