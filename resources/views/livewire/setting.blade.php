<div class="flex flex-col font-yusei">
    <div class="flex flex-col mt-5 mb-5">
        <label>ユーザ名</label>
        <input class="w-full bg-mywhite border-mydark input input-bordered" maxlength="15" wire:model.lazy="user.name" />
    </div>
    <button type="button" class="btn bg-mydark text-mywhite w-full text-[15px] hover:bg-mydark/80 mb-10" wire:click="save">更新</button>
    <button type="button" class="btn btn-error text-mywhite" wire:click="deleteAccount" wire:confirm="アカウントを削除すると、紐づいている投稿や画像など全てのファイルが削除されます。削除してよろしいですか？">アカウント削除</button>
</div>