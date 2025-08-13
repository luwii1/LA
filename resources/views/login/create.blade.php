<x-layouts.auth>
    <form method="post" class="space-y-3">
        @csrf
        <x-input id="email" label="البريد الالكتروني" icon="icon-[tabler--mail]" type="email" />
        <x-input id="password" label="كلمة المرور" icon="icon-[tabler--lock]" type="password" />

        <button type="submit" class="btn btn-primary w-full mt-8">تسجيل دخول</button>
        <span>
            ليس لديك حساب؟
            <a href="/register" class="link link-animated">انشاء حساب </a>
        </span>
    </form>
</x-layouts.auth>