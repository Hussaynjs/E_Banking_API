<?php

namespace App\Dtos;

use App\Interface\DtoInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class UserDto implements DtoInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    private ?int $id = null;
    private string $name;
    private string $email;
    private string $password;
    private string $phone_number;
    private string $pin;

    private ?Carbon $created_at = null;
    private ?Carbon $updated_at = null;


    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function getPin(): string
    {
        return $this->pin;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updated_at;
    }

    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function setPin(string $pin): self
    {
        $this->pin = $pin;

        return $this;
    }

    public function setCreatedAt(?Carbon $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function setUpdatedAt(?Carbon $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

     #[Override]
    public static function formApiRequest(FormRequest $formRequest): DtoInterface
    {
        $userDto = new UserDto();
        $userDto->setName($formRequest->input('name'));
        $userDto->setEmail($formRequest->input('email'));
        $userDto->setPassword($formRequest->input('password'));
        $userDto->setPhoneNumber($formRequest->input('phone_number'));
        $userDto->setPin($formRequest->input('pin'));

        return $userDto;
    }

    #[Override]
    public static function fromModel(User|Model $model): DtoInterface
    {
        $userDto = new UserDto();
        $userDto->setId($model->id);
        $userDto->setName($model->name);
        $userDto->setEmail($model->email);
        $userDto->setPassword($model->password);
        $userDto->setPhoneNumber($model->phone_number);
        $userDto->setPin($model->pin);
        $userDto->setCreatedAt($model->created_at);
        $userDto->setUpdatedAt($model->updated_at);

        return $userDto;
    }

    public static function toArray(Model $model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'phone_number' => $model->phone_number,
            'pin' => $model->pin,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}