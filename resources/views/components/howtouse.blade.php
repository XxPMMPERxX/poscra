<div
    id="how_to_use_open"
    class="fixed bottom-[50px] right-[20px] w-[70px] h-[70px] rounded-full bg-myaccent text-center animate-bounce shadow-md opacity-[0.6] hover:opacity-[1.0] hover:cursor-pointer"
    onclick="how_to_use.show()"
>
    <img src="{{ Vite::asset('resources/images/pickel.png') }}" class="w-[40px] h-[40px] mx-auto mt-[5px] mb-[-10px]" />
    <span class="text-mywhite font-yusei text-[12px]">つかいかた</span>
</div>
<dialog id="how_to_use" class="modal">
    <div class="modal-box bg-mywhite max-w-[1190px] max-h-[80%] bg-mywhite flex flex-col gap-5 text-mydark font-yusei md:divide-none divide-y divide-gray-200">
        <h1 class="text-[20px]">つかいかた（投稿までの道のり）</h1>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/minecraft1.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>①ワールド生成する</li>
                    <li>ワールドタイプはフラットの方がおすすめです</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/minecraft2.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>②建築する</li>
                    <li>思うまま、好きなように建築しましょう！</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/minecraft3.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>③建築完成！！</li>
                    <li>素晴らしい建築ができました（豆腐？はて....）</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/minecraft4.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>④-1 ストラクチャーブロックの取得</li>
                    <li>建築のエクスポートにはストラクチャーブロックを使います</li>
                    <li>ストラクチャーブロックは <span class="bg-slate-300 font-sans">/give @s structure_block 1</span> というコマンドで手に入れられます</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/minecraft6.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>④-2 ストラクチャーブロックの取得</li>
                    <li>画像のインベントリの一番右のブロックがストラクチャーブロックです</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/minecraft8.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑤-1 建築のエクスポート（mcstructureファイル）</li>
                    <li>ストラクチャーブロックを建築物の角の延長に設置します</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/minecraft7.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑤-2 建築のエクスポート（mcstructureファイル）</li>
                    <li>エクスポートする建築の名前と領域（はんい）を設定します</li>
                    <li>モードは複数ありますが、「保存」で良いです</li>
                    <li>範囲設定はわかりにくいかもしれませんが、⑤-1 の画像の白い線が出力したい建築をカバーできればokです</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/structure_guide1.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑤-3 建築のエクスポート（mcstructureファイル）</li>
                    <li>設定後、エクスポートボタンを押すと画像のようにファイルの出力先を選択する画面が出てくるのでお好きな場所に保存</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/structure_guide2.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑥建築の3Dモデルのエクスポート（glbファイル）</li>
                    <li>設定後、モードを「3D エクスポート」に変更</li>
                    <li>再度エクスポートボタンを押すとファイルの保存先の選択画面が出るのでお好きなところで保存</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide2.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑦-1 建築の投稿</li>
                    <li><span class="font-sans cursor-pointer" onclick="window.open('/dashboard')">ダッシュボード</span> にアクセス</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide3.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑦-2 建築の投稿</li>
                    <li>新規追加ボタンを押すと画像のモーダルが表示されます</li>
                    <li>左側の大きい領域をクリックか、直接ファイルをドラッグアンドドロップで 先ほど出力した「glbファイル」をアップロード</li>
                    <li>右側の mcstructure のファイル選択ボタンをクリックして、先ほど出力した「mcstructureファイル」をアップロード</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide4.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑦-3 建築の投稿</li>
                    <li>ファイルのアップロードができると画像のようになります</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide5.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑦-4 建築の投稿</li>
                    <li>3Dモデルはマウス操作で角度や大きさなどを調整でき、良いと思ったら「サムネイルとして設定」を押します</li>
                    <li>タイトルと説明を記載します</li>
                    <li>全て問題なければ「投稿」ボタンをおして投稿!!</li>
                </ul>
            </div>
        </div>
        <div class="flex gap-2.5">
            <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide6.png') }}" class="w-1/2 object-contain" />
            <div class="w-1/2">
                <ul>
                    <li>⑦-5 建築の投稿</li>
                    <li>投稿が完了すると「あなたの投稿一覧」に投稿が表示されます</li>
                    <li>お疲れ様でした！！！</li>
                </ul>
            </div>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop bg-mydark/40">
        <button>close</button>
    </form>
</dialog>