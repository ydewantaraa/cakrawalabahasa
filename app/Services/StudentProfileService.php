<?php

namespace App\Services;

use App\Mail\VerifyEmailMail;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class StudentProfileService
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

            if ($emailChanged) {
                $url = url("/api/auth/email/verify/{$user->id}/" . sha1($user->email));

                Mail::to($user->email)->send(new VerifyEmailMail($url));
            }

            // ======================
            // UPDATE STUDENT PROFILE
            // ======================
            $user->student_profile()->updateOrCreate(
                ['student_id' => $user->id],
                [
                    'whatsapp' => $data['whatsapp'],
                    'birthday' => $data['birthday'],
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
