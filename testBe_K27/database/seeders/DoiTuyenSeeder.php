<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoiTuyen;
use App\Models\NguoiDung;

class DoiTuyenSeeder extends Seeder
{
    public function run(): void
    {
        $users   = NguoiDung::where('id_chuc_vu', 4)->orWhere('id_chuc_vu', 1)->get();
        $userIds = $users->pluck('id')->toArray();
        if (empty($userIds)) {
            $userIds = [1, 2, 3, 4];
        }

        $doiTuyens = [
            [
                'ten_doi_tuyen' => 'GAM Esports',
                'ten_viet_tat' => 'GAM',
                'logo'          => 'https://yt3.ggpht.com/a/AGF-l79isW3-cSjSovsVGhTTvDM7uwl18tBcR_NL1g=s900-c-k-c0xffffffff-no-rj-mo',
                'mo_ta'         => 'Đội tuyển Esport giàu thành tích bậc nhất lịch sử Liên Minh Huyền Thoại Việt Nam.',
                'trang_thai'    => 1,
                'created_at'    => '2020-01-10 08:00:00'
            ],
            [
                'ten_doi_tuyen' => 'Cerberus Esports',
                'ten_viet_tat' => 'CES',
                'logo'          => 'https://img.freepik.com/premium-vector/cerberus-esports-mascot-logo_91719-145.jpg?w=996',
                'mo_ta'         => 'Đội tuyển chuyên nghiệp nổi tiếng với lối chơi tấn công mạnh mẽ.',
                'trang_thai'    => 1,
                'created_at'    => '2020-01-15 09:30:00'
            ],
            [
                'ten_doi_tuyen' => 'Saigon Buffalo',
                'ten_viet_tat' => 'SGB',
                'logo'          => 'https://gol.gg/_img/teams_icon/Saigon_Buffalologo_square.webp',
                'mo_ta'         => 'Đội tuyển "Bầy Trâu" từng nhiều lần đại diện Việt Nam thi đấu quốc tế.',
                'trang_thai'    => 1,
                'created_at'    => '2020-02-01 10:15:00'
            ],
            [
                'ten_doi_tuyen' => 'Vikings Esports',
                'ten_viet_tat' => 'VKE',
                'logo'          => 'https://img.freepik.com/premium-vector/viking-esport-gaming-mascot-logo-design-illustration-vector-vikings-skull-with-axe_268458-869.jpg?w=1480',
                'mo_ta'         => 'Đội tuyển của Vikings với sự dẫn dắt từ các huyền thoại kỳ cựu.',
                'trang_thai'    => 1,
                'created_at'    => '2020-02-20 14:00:00'
            ],
            [
                'ten_doi_tuyen' => 'MGN Blue Esports',
                'ten_viet_tat' => 'MBE',
                'logo'          => 'https://yt3.googleusercontent.com/PFlyEqnCbPAL5A7Acw4gHJrAJdGfHwas27EkpE1sz_wEZvom5agiqTEYfENRixlMu_TjqWj_Qg=s900-c-k-c0x00ffffff-no-rj',
                'mo_ta'         => 'Đội tuyển trẻ có phong cách thi đấu đầy khát khao và đột phá.',
                'trang_thai'    => 1,
                'created_at'    => '2020-03-05 11:20:00'
            ],
            [
                'ten_doi_tuyen' => 'Team Whales',
                'ten_viet_tat' => 'TW',
                'logo'          => 'https://storage.ensigame.com/logos/teams/e3a5bb55b866d60ef217984b25c5889a.png',
                'mo_ta'         => 'Đội tuyển "Bầy Cá Voi" thế lực mới mạnh mẽ tại VCS.',
                'trang_thai'    => 1,
                'created_at'    => '2021-01-12 15:45:00'
            ],
            [
                'ten_doi_tuyen' => 'Team Flash',
                'ten_viet_tat' => 'FL',
                'logo'          => 'https://polymarket.com/_next/image?url=https:%2F%2Fcdn-api.pandascore.co%2Fimages%2Fteam%2Fimage%2F134983%2F178px_team_flash_allmode.png&w=1024&q=75',
                'mo_ta'         => 'Tổ chức Esports danh tiếng Đông Nam Á có chi nhánh tại Việt Nam.',
                'trang_thai'    => 1,
                'created_at'    => '2021-02-18 13:10:00'
            ],
            [
                'ten_doi_tuyen' => 'Rainbow Warriors',
                'ten_viet_tat' => 'RW',
                'logo'          => 'https://m.media-amazon.com/images/I/61VJ19vyduL._AC_UF1000,1000_QL80_.jpg',
                'mo_ta'         => 'Đội tuyển mới nổi với lối chơi đoàn kết, cống hiến.',
                'trang_thai'    => 1,
                'created_at'    => '2021-04-10 09:00:00'
            ],
            [
                'ten_doi_tuyen' => 'Luxury Esports',
                'ten_viet_tat' => 'LX',
                'logo'          => 'https://gamelandvn.com/wp-content/uploads/anh/2021/12/lx-logo.jpg',
                'mo_ta'         => 'Đội tuyển có tinh thần chiến đấu quả cảm, kiên cường.',
                'trang_thai'    => 1,
                'created_at'    => '2021-06-22 16:30:00'
            ],
            [
                'ten_doi_tuyen' => 'Team Secret',
                'ten_viet_tat' => 'TS',
                'logo'          => 'https://ih1.redbubble.net/image.1555046202.7385/poster,504x498,f8f8f8-pad,600x600,f8f8f8.jpg',
                'mo_ta'         => 'Ẩn Mật Giáo - đội tuyển có lượng fan đông đảo cùng lối chơi cống hiến.',
                'trang_thai'    => 1,
                'created_at'    => '2021-08-15 10:20:00'
            ],
            [
                'ten_doi_tuyen' => 'T1 Esports',
                'ten_viet_tat' => 'T1',
                'logo'          => 'https://cdn1.dotesports.com/wp-content/uploads/2019/12/03000934/image-7.png',
                'mo_ta'         => 'Đội tuyển huyền thoại giàu truyền thống nhất thế giới.',
                'trang_thai'    => 1,
                'created_at'    => '2022-01-05 08:00:00'
            ],
            [
                'ten_doi_tuyen' => 'Gen.G Esports',
                'ten_viet_tat' => 'GEN',
                'logo'          => 'https://mma.prnewswire.com/media/774883/GenG_Logo.jpg?p=publish',
                'mo_ta'         => 'Đội tuyển Esports hàng đầu khu vực LCK.',
                'trang_thai'    => 1,
                'created_at'    => '2022-02-10 14:15:00'
            ],
            [
                'ten_doi_tuyen' => 'Paper Rex',
                'ten_viet_tat' => 'PRX',
                'logo'          => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Paper_Rex_logo.svg/250px-Paper_Rex_logo.svg.png',
                'mo_ta'         => 'Đội tuyển Valorant với phong cách thi đấu hoa mỹ số 1 Châu Á.',
                'trang_thai'    => 1,
                'created_at'    => '2022-04-12 11:30:00'
            ],
            [
                'ten_doi_tuyen' => 'Fnatic',
                'ten_viet_tat' => 'FNC',
                'logo'          => 'https://cdn.sanity.io/images/5gii1snx/production/c32c2cb848fd3338ff23a590ec5c0e052b080f27-1000x1000.png',
                'mo_ta'         => 'Tổ chức Esports hàng đầu Châu Âu.',
                'trang_thai'    => 1,
                'created_at'    => '2022-06-18 09:45:00'
            ],
            [
                'ten_doi_tuyen' => 'G2 Esports',
                'ten_viet_tat' => 'G2',
                'logo'          => 'https://gamepedia.cursecdn.com/lolesports_gamepedia_en/7/77/G2_Esportslogo_square.png',
                'mo_ta'         => 'Đội tuyển nổi tiếng với lối thi đấu biến hóa ngẫu hứng.',
                'trang_thai'    => 1,
                'created_at'    => '2022-09-20 15:10:00'
            ],
            [
                'ten_doi_tuyen' => 'Sentinels',
                'ten_viet_tat' => 'SEN',
                'logo'          => 'https://mir-s3-cdn-cf.behance.net/projects/max_808/337dac129302981.Y3JvcCw4MDgsNjMyLDAsMA.png',
                'mo_ta'         => 'Đội tuyển Valorant đình đám khu vực Bắc Mỹ.',
                'trang_thai'    => 1,
                'created_at'    => '2023-01-15 10:00:00'
            ],
            [
                'ten_doi_tuyen' => 'Team Liquid',
                'ten_viet_tat' => 'TL',
                'logo'          => 'https://store.teamliquid.eu/cdn/shop/files/TL_Crest_-_Primary.svg?v=1707003691&width=100',
                'mo_ta'         => 'Tổ chức Esports toàn cầu giàu thành tích.',
                'trang_thai'    => 1,
                'created_at'    => '2023-03-22 13:40:00'
            ],
            [
                'ten_doi_tuyen' => 'Natus Vincere',
                'ten_viet_tat' => 'NAVI',
                'logo'          => 'https://images3.alphacoders.com/135/thumb-1920-1357712.jpeg',
                'mo_ta'         => 'Đội tuyển CS2 & Dota 2 huyền thoại Đông Âu.',
                'trang_thai'    => 1,
                'created_at'    => '2023-05-18 16:00:00'
            ],
            [
                'ten_doi_tuyen' => 'Cloud9',
                'ten_viet_tat' => 'C9',
                'logo'          => 'https://download.logo.wine/logo/Cloud9/Cloud9-Logo.wine.png',
                'mo_ta'         => 'Đội tuyển thể thao điện tử lâu đời khu vực Bắc Mỹ.',
                'trang_thai'    => 1,
                'created_at'    => '2023-08-10 11:15:00'
            ],
            [
                'ten_doi_tuyen' => 'EDward Gaming',
                'ten_viet_tat' => 'EDG',
                'logo'          => 'https://s-qwer.op.gg/images/lol/teams/374_1672191295744.png',
                'mo_ta'         => 'Đội tuyển Esport hàng đầu khu vực LPL Trung Quốc.',
                'trang_thai'    => 1,
                'created_at'    => '2024-01-12 09:30:00'
            ],
            [
                'ten_doi_tuyen' => 'DRX Esports',
                'ten_viet_tat' => 'DRX',
                'logo'          => 'https://tse1.mm.bing.net/th/id/OIP.rUQhobLuZpGj_lcb_4QSkAHaHa?r=0&pid=Api&P=0&h=180',
                'mo_ta'         => 'Đội tuyển nổi tiếng với câu chuyện thần thoại Vô địch Thế giới.',
                'trang_thai'    => 1,
                'created_at'    => '2024-04-05 14:20:00'
            ],
            [
                'ten_doi_tuyen' => 'Furia Esports',
                'ten_viet_tat' => 'FUR',
                'logo'          => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/c8ba2680-5b2f-422c-8a19-2ce41f2041b3/dbwilaz-257c955f-30f1-4825-b3a9-927ae5a92aba.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2M4YmEyNjgwLTViMmYtNDIyYy04YTE5LTJjZTQxZjIwNDFiM1wvZGJ3aWxhei0yNTdjOTU1Zi0zMGYxLTQ4MjUtYjNhOS05MjdhZTVhOTJhYmEuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.3Et4p2B3ORewkq2UFuxErmrsMgzwkP4JBqSvCJn3mKk',
                'mo_ta'         => 'Đội tuyển CS2 vũ bão khu vực Nam Mỹ.',
                'trang_thai'    => 1,
                'created_at'    => '2024-07-15 10:00:00'
            ],
            [
                'ten_doi_tuyen' => 'Virtus.pro',
                'ten_viet_tat' => 'VP',
                'logo'          => 'https://iconape.com/wp-content/png_logo_vector/virtus-pro.png',
                'mo_ta'         => 'Đội tuyển kỳ cựu các tựa game bắn súng chiến thuật.',
                'trang_thai'    => 0,
                'created_at'    => '2025-01-10 15:30:00'
            ],
            [
                'ten_doi_tuyen' => 'LGD Gaming',
                'ten_viet_tat' => 'LGD',
                'logo'          => 'https://e7.pngegg.com/pngimages/268/80/png-clipart-dota-2-lgd-gaming-flytomoon-psg-lgd-electronic-sports-kang-han-na-emblem-trademark-thumbnail.png',
                'mo_ta'         => 'Đội tuyển Dota 2 hàng đầu Châu Á.',
                'trang_thai'    => 0,
                'created_at'    => '2025-05-20 11:45:00'
            ],
            [
                'ten_doi_tuyen' => 'Astralis',
                'ten_viet_tat' => 'AST',
                'logo'          => 'https://wallpaperaccess.com/full/1805919.jpg',
                'mo_ta'         => 'Huyền thoại CS:GO/CS2 Đan Mạch.',
                'trang_thai'    => 0,
                'created_at'    => '2025-09-12 08:15:00'
            ],
        ];

        foreach ($doiTuyens as $key => $dt) {
            $dt['id_nguoi_dung'] = $userIds[$key % count($userIds)];
            DoiTuyen::create($dt);
        }
    }
}
