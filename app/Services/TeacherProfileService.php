<?php

namespace App\services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeacherProfileService
{
    public function update($user, array $data): array
    {
        DB::beginTransaction();

        try {
            $emailChanged = false;

            $userData = [
                'full_name' => $data['full_name'],
            ];

            // ======================
            // HANDLE EMAIL CHANGE
            // ======================
            if (
                isset($data['email']) &&
                $data['email'] !== $user->email
            ) {
                $emailChanged = true;

                $wasGoogleUser = !is_null($user->google_id);

                $userData['email'] = $data['email'];
                $userData['email_verified_at'] = null;

                if ($wasGoogleUser) {
                    $userData['google_id'] = null;

                    $oldAvatar = $user->getRawOriginal('avatar');

                    if ($oldAvatar && Storage::disk('public')->exists($oldAvatar)) {
                        Storage::disk('public')->delete($oldAvatar);
                    }

                    $userData['avatar'] = null;
                }
            }

            // ======================
            // HANDLE AVATAR
            // ======================
            if (isset($data['avatar']) && $data['avatar'] instanceof UploadedFile) {

                $oldAvatar = $user->getRawOriginal('avatar');

                if ($oldAvatar && Storage::disk('public')->exists($oldAvatar)) {
                    Storage::disk('public')->delete($oldAvatar);
                }

                $userData['avatar'] = $data['avatar']->store('avatars', 'public');
            }

            $user->update($userData);

            // ======================
            // UPDATE TEACHER PROFILE
            // ======================
            $user->teacher_profile()->updateOrCreate(
                ['teacher_id' => $user->id],
                [
                    'whatsapp' => $data['whatsapp'],
                ]
            );

            DB::commit();

            return [
                'email_changed' => $emailChanged,
            ];
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
