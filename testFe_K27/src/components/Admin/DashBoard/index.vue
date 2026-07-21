<template>
  <div class="page-content" :style="pageStyle">
    <!-- HÀNG 1: 4 CARD THỐNG KÊ (GLASSMORPHISM & HOVER ANIMATION INLINE) -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3 mb-4">
      <!-- Card 1: Tổng Tài Trợ -->
      <div class="col">
        <div
          class="card h-100 border-start border-0 border-4 border-info shadow-sm"
          :style="[cardStyle, hoverState[1] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[1] = true"
          @mouseleave="hoverState[1] = false"
        >
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <p class="mb-1" :style="uppercaseLabelStyle">Tổng Tài Trợ</p>
                <h3 class="my-1 text-info fw-bold" :style="pageStyle">
                  {{ formatVND(dbData.total_sponsorship) }}
                </h3>
                <p class="mb-0 font-13 text-success d-flex align-items-center">
                  <i class="bx bx-trending-up me-1 font-16"></i>
                  <span>Tài trợ chính thức</span>
                </p>
              </div>
              <div
                class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"
                :style="[
                  iconStyle,
                  shadowScooter,
                  hoverState[1] ? iconHoverStyle : {},
                ]"
              >
                <i class="bx bxs-wallet"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 2: Tổng Giải Đấu -->
      <div class="col">
        <div
          class="card h-100 border-start border-0 border-4 border-danger shadow-sm"
          :style="[cardStyle, hoverState[2] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[2] = true"
          @mouseleave="hoverState[2] = false"
        >
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <p class="mb-1" :style="uppercaseLabelStyle">Tổng Giải Đấu</p>
                <h3 class="my-1 text-danger fw-bold" :style="pageStyle">
                  {{ dbData.total_tournaments }} Giải
                </h3>
                <p class="mb-0 font-13 text-success d-flex align-items-center">
                  <i class="bx bx-trending-up me-1 font-16"></i>
                  <span>Tổ chức chuyên nghiệp</span>
                </p>
              </div>
              <div
                class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"
                :style="[
                  iconStyle,
                  shadowBloody,
                  hoverState[2] ? iconHoverStyle : {},
                ]"
              >
                <i class="bx bxs-show"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 3: Đội Tuyển -->
      <div class="col">
        <div
          class="card h-100 border-start border-0 border-4 border-success shadow-sm"
          :style="[cardStyle, hoverState[3] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[3] = true"
          @mouseleave="hoverState[3] = false"
        >
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <p class="mb-1" :style="uppercaseLabelStyle">Tổng Đội Tuyển</p>
                <h3 class="my-1 text-success fw-bold" :style="pageStyle">
                  {{ dbData.total_teams }} Đội
                </h3>
                <p class="mb-0 font-13 text-success d-flex align-items-center">
                  <i class="bx bx-trending-up me-1 font-16"></i>
                  <span>Đăng ký tham gia giải</span>
                </p>
              </div>
              <div
                class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"
                :style="[
                  iconStyle,
                  shadowOhhappiness,
                  hoverState[3] ? iconHoverStyle : {},
                ]"
              >
                <i class="bx bxs-group"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 4: Tuyển Thủ -->
      <div class="col">
        <div
          class="card h-100 border-start border-0 border-4 border-warning shadow-sm"
          :style="[cardStyle, hoverState[4] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[4] = true"
          @mouseleave="hoverState[4] = false"
        >
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <p class="mb-1" :style="uppercaseLabelStyle">Tuyển Thủ</p>
                <h3 class="my-1 text-warning fw-bold" :style="pageStyle">
                  {{ dbData.total_players }} HĐ
                </h3>
                <p class="mb-0 font-13 text-success d-flex align-items-center">
                  <i class="bx bx-trending-up me-1 font-16"></i>
                  <span>Hợp đồng chuyên nghiệp</span>
                </p>
              </div>
              <div
                class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"
                :style="[
                  iconStyle,
                  shadowBlooker,
                  hoverState[4] ? iconHoverStyle : {},
                ]"
              >
                <i class="bx bxs-user"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end row-->

    <!-- HÀNG 2: BIỂU ĐỒ CHÍNH & GAME THỊNH HÀNH -->
    <div class="row g-4 mb-4">
      <!-- Thống Kê Tổng Quan Giải Đấu -->
      <div class="col-12 col-lg-8">
        <div
          class="card radius-12 shadow-sm h-100"
          :style="[cardStyle, hoverState[5] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[5] = true"
          @mouseleave="hoverState[5] = false"
        >
          <div class="card-body p-4">
            <div class="d-flex align-items-center mb-3">
              <div>
                <h5 class="mb-0 fw-bold text-dark" :style="pageStyle">
                  Tổng Quan Lượt Xem & Doanh Thu
                </h5>
                <p class="mb-0 text-secondary font-13">
                  Thống kê chi tiết theo từng tháng trong năm
                </p>
              </div>
              <div class="dropdown ms-auto">
                <a
                  class="dropdown-toggle dropdown-toggle-nocaret text-secondary"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <i class="bx bx-dots-horizontal-rounded font-22"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                  <li>
                    <a class="dropdown-item py-2" href="javascript:;"
                      ><i class="bx bx-download me-2"></i>Tải báo cáo PDF</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item py-2" href="javascript:;"
                      ><i class="bx bx-refresh me-2"></i>Làm mới dữ liệu</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <div class="d-flex align-items-center gap-3 mb-4 font-13">
              <div
                class="d-flex align-items-center gap-1 font-weight-bold text-dark"
              >
                <span :style="[chartIndicatorStyle, bgInfoGlow]"></span> Lượt
                Xem (Triệu)
              </div>
              <div
                class="d-flex align-items-center gap-1 font-weight-bold text-dark"
              >
                <span :style="[chartIndicatorStyle, bgWarningGlow]"></span>
                Doanh Thu (Tr. VNĐ)
              </div>
            </div>
            <div :style="chartContainer1">
              <canvas id="chart1"></canvas>
            </div>
          </div>
          <div
            class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top py-2"
          >
            <div class="col py-2 border-end">
              <h4 class="mb-1 fw-bold text-dark" :style="pageStyle">
                {{ totalViewers }}
              </h4>
              <small
                class="text-secondary font-12 d-flex align-items-center justify-content-center gap-1"
              >
                Tổng lượt xem
                <span class="text-success"
                  ><i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span
                >
              </small>
            </div>
            <div class="col py-2 border-end">
              <h4 class="mb-1 fw-bold text-dark" :style="pageStyle">
                {{ averageViewers }}
              </h4>
              <small
                class="text-secondary font-12 d-flex align-items-center justify-content-center gap-1"
              >
                Lượt xem TB/Tháng
                <span class="text-success"
                  ><i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span
                >
              </small>
            </div>
            <div class="col py-2">
              <h4 class="mb-1 fw-bold text-dark" :style="pageStyle">
                {{ peakViewers }}
              </h4>
              <small
                class="text-secondary font-12 d-flex align-items-center justify-content-center gap-1"
              >
                Peak Viewers
                <span class="text-success"
                  ><i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span
                >
              </small>
            </div>
          </div>
        </div>
      </div>

      <!-- Top Game Thịnh Hành -->
      <div class="col-12 col-lg-4">
        <div
          class="card radius-12 shadow-sm h-100"
          :style="[cardStyle, hoverState[6] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[6] = true"
          @mouseleave="hoverState[6] = false"
        >
          <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
              <div>
                <h5 class="mb-0 fw-bold text-dark" :style="pageStyle">
                  Game Thịnh Hành
                </h5>
                <p class="mb-0 text-secondary font-13">
                  Tỉ lệ phân chia theo lượt trận đấu
                </p>
              </div>
              <div class="dropdown ms-auto">
                <a
                  class="dropdown-toggle dropdown-toggle-nocaret text-secondary"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <i class="bx bx-dots-horizontal-rounded font-22"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                  <li>
                    <a class="dropdown-item py-2" href="javascript:;"
                      ><i class="bx bx-list-ul me-2"></i>Danh sách đầy đủ</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <div :style="chartContainer2">
              <canvas id="chart2"></canvas>
            </div>
          </div>
          <ul class="list-group list-group-flush border-top">
            <li
              v-for="(item, index) in computedGamePopularity.slice(0, 4)"
              :key="index"
              class="list-group-item d-flex bg-transparent justify-content-between align-items-center py-3 border-0 border-bottom"
            >
              <div class="d-flex align-items-center gap-2">
                <span
                  :style="[legendDotStyle, { backgroundColor: item.color }]"
                ></span>
                <span class="fw-semibold text-dark font-14">{{
                  item.name
                }}</span>
              </div>
              <span
                class="badge rounded-pill px-3 py-1 font-12"
                :class="[item.bgClass, item.textClass]"
                >{{ item.percentage }}%</span
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--end row-->

    <!-- HÀNG 3: DANH SÁCH TRẬN ĐẤU MỚI NHẤT -->
    <div
      class="card radius-12 shadow-sm mb-4"
      :style="[cardStyle, hoverState[7] ? cardHoverStyle : {}]"
      @mouseenter="hoverState[7] = true"
      @mouseleave="hoverState[7] = false"
    >
      <div class="card-body p-4">
        <div class="d-flex align-items-center mb-4">
          <div>
            <h5 class="mb-0 fw-bold text-dark" :style="pageStyle">
              Trận Đấu Mới Nhất
            </h5>
            <p class="mb-0 text-secondary font-13">
              Cập nhật kết quả và tiến độ trực tiếp
            </p>
          </div>
          <div class="dropdown ms-auto">
            <a
              class="dropdown-toggle dropdown-toggle-nocaret text-secondary"
              href="#"
              data-bs-toggle="dropdown"
            >
              <i class="bx bx-dots-horizontal-rounded font-22"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
              <li>
                <a class="dropdown-item py-2" href="javascript:;"
                  ><i class="bx bx-show-alt me-2"></i>Xem lịch thi đấu</a
                >
              </li>
            </ul>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light border-0">
              <tr>
                <th class="py-3 border-0 rounded-start-3">Giải Đấu</th>
                <th class="py-3 border-0">Logo</th>
                <th class="py-3 border-0">Mã Trận Đấu</th>
                <th class="py-3 border-0">Trạng Thái</th>
                <th class="py-3 border-0">Lượt Xem Live</th>
                <th class="py-3 border-0">Ngày Đấu</th>
                <th class="py-3 border-0 rounded-end-3" style="width: 200px">
                  Tiến Độ Giải
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(item, index) in dbData.recent_tournaments"
                :key="index"
                :style="tableRowStyle"
              >
                <td class="fw-semibold text-dark py-3">
                  {{ item.ten_giai_dau }}
                </td>
                <td>
                  <img
                    :src="
                      item.logo ||
                      'https://api.dicebear.com/7.x/identicon/svg?seed=' +
                        encodeURIComponent(item.ten_giai_dau)
                    "
                    :style="productImgStyle"
                    class="shadow-sm border"
                    alt="logo img"
                  />
                </td>
                <td class="text-secondary">#GD{{ item.id }}</td>
                <td>
                  <span
                    v-if="item.trang_thai == 2"
                    :style="badgePremiumStyle"
                    class="bg-light-success text-success shadow-none"
                    ><span
                      :style="[badgeDotStyle, { backgroundColor: '#2dce89' }]"
                    ></span
                    >Đã đấu</span
                  >
                  <span
                    v-else-if="item.trang_thai == 1"
                    :style="badgePremiumStyle"
                    class="bg-light-danger text-danger shadow-none"
                  >
                    <span
                      :style="[
                        badgeDotStyle,
                        { backgroundColor: '#f5365c' },
                        {
                          opacity: liveBlink ? 1 : 0.3,
                          transition: 'opacity 0.4s ease',
                        },
                      ]"
                    ></span>
                    Đang đấu
                  </span>
                  <span
                    v-else
                    :style="badgePremiumStyle"
                    class="bg-light-warning text-warning shadow-none"
                    ><span
                      :style="[badgeDotStyle, { backgroundColor: '#fb6340' }]"
                    ></span
                    >Đang chờ</span
                  >
                </td>
                <td
                  class="fw-semibold"
                  :class="{
                    'text-danger d-flex align-items-center gap-1':
                      item.trang_thai == 1,
                  }"
                >
                  <span
                    v-if="item.trang_thai == 1"
                    :style="[
                      {
                        display: 'inline-block',
                        width: '8px',
                        height: '8px',
                        borderRadius: '50%',
                        backgroundColor: '#f5365c',
                      },
                      {
                        opacity: liveBlink ? 1 : 0.3,
                        transition: 'opacity 0.4s ease',
                      },
                    ]"
                  ></span>
                  {{
                    item.trang_thai == 1
                      ? "45.8K"
                      : item.trang_thai == 2
                        ? "125K"
                        : "0"
                  }}
                </td>
                <td class="text-secondary">{{ item.ngay_bat_dau }}</td>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <div
                      class="progress flex-grow-1"
                      style="height: 6px; border-radius: 3px"
                    >
                      <div
                        class="progress-bar"
                        :class="
                          item.trang_thai == 2
                            ? 'bg-gradient-quepal'
                            : item.trang_thai == 1
                              ? 'bg-gradient-blooker'
                              : 'bg-gradient-bloody'
                        "
                        role="progressbar"
                        :style="{
                          width:
                            (item.trang_thai == 2
                              ? 100
                              : item.trang_thai == 1
                                ? 60
                                : 20) + '%',
                          borderRadius: '3px',
                        }"
                      ></div>
                    </div>
                    <span class="font-12 fw-bold text-secondary"
                      >{{
                        item.trang_thai == 2
                          ? 100
                          : item.trang_thai == 1
                            ? 60
                            : 20
                      }}%</span
                    >
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- HÀNG 4: BẢN ĐỒ TÀI TRỢ & THƯƠNG HIỆU -->
    <div class="row g-4 mb-4">
      <div class="col-12 col-lg-7 col-xl-8 d-flex">
        <div
          class="card radius-12 shadow-sm w-100"
          :style="[cardStyle, hoverState[8] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[8] = true"
          @mouseleave="hoverState[8] = false"
        >
          <div class="card-header bg-transparent border-0 px-4 pt-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0 fw-bold text-dark" :style="pageStyle">
                  Bản Đồ Phân Phối Người Xem
                </h5>
                <p class="mb-0 text-secondary font-13">
                  Vùng mật độ tập trung lượng người xem trực tuyến Đông Nam Á
                </p>
              </div>
              <div class="dropdown ms-auto">
                <a
                  class="dropdown-toggle dropdown-toggle-nocaret text-secondary"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <i class="bx bx-dots-horizontal-rounded font-22"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                  <li>
                    <a class="dropdown-item py-2" href="javascript:;"
                      ><i class="bx bx-zoom-in me-2"></i>Xem toàn màn hình</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <div class="row align-items-center">
              <!-- JQuery Vector Map Container -->
              <div class="col-lg-7 col-xl-8 border-end pb-3 pb-lg-0">
                <div
                  id="geographic-map-2"
                  style="height: 270px; width: 100%"
                ></div>
              </div>
              <!-- Southeast Asia distribution list -->
              <div class="col-lg-5 col-xl-4 ps-lg-4">
                <div
                  v-for="(item, index) in dbData.geo_stats"
                  :key="index"
                  :class="index < dbData.geo_stats.length - 1 ? 'mb-4' : 'mb-0'"
                >
                  <div class="d-flex justify-content-between mb-1">
                    <span class="fw-semibold text-dark font-14"
                      ><i class="bx bx-map-pin me-1" :class="item.color"></i
                      >{{ item.name }}</span
                    >
                    <span class="fw-bold" :class="item.color"
                      >{{ item.percentage }}%</span
                    >
                  </div>
                  <div class="progress" style="height: 7px; border-radius: 4px">
                    <div
                      class="progress-bar"
                      :class="item.bgClass"
                      role="progressbar"
                      :style="{ width: item.percentage + '%' }"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-5 col-xl-4 d-flex">
        <div
          class="card w-100 radius-12 shadow-sm"
          :style="[cardStyle, hoverState[9] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[9] = true"
          @mouseleave="hoverState[9] = false"
        >
          <div class="card-body p-4 d-flex flex-column justify-content-between">
            <div
              class="card radius-10 border shadow-none mb-3"
              :style="[
                interactionCardStyle,
                hoverState[10] ? interactionCardHoverStyle : {},
              ]"
              @mouseenter="hoverState[10] = true"
              @mouseleave="hoverState[10] = false"
            >
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <p class="mb-0 text-secondary font-13 fw-semibold">
                      Lượt Yêu Thích
                    </p>
                    <h3 class="my-1 fw-bold text-dark" :style="pageStyle">
                      45.6M
                    </h3>
                    <p class="mb-0 font-12 text-success">
                      <i class="bx bx-trending-up me-1"></i>+6.2% tuần này
                    </p>
                  </div>
                  <div
                    class="widgets-icons-2 bg-gradient-cosmic text-white ms-auto"
                    :style="[
                      iconStyle,
                      shadowCosmic,
                      hoverState[10] ? iconHoverStyle : {},
                    ]"
                  >
                    <i class="bx bxs-heart-circle"></i>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="card radius-10 border shadow-none mb-3"
              :style="[
                interactionCardStyle,
                hoverState[11] ? interactionCardHoverStyle : {},
              ]"
              @mouseenter="hoverState[11] = true"
              @mouseleave="hoverState[11] = false"
            >
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <p class="mb-0 text-secondary font-13 fw-semibold">
                      Bình Luận Live
                    </p>
                    <h3 class="my-1 fw-bold text-dark" :style="pageStyle">
                      25.6K
                    </h3>
                    <p class="mb-0 font-12 text-success">
                      <i class="bx bx-trending-up me-1"></i>+3.7% tuần này
                    </p>
                  </div>
                  <div
                    class="widgets-icons-2 bg-gradient-ibiza text-white ms-auto"
                    :style="[
                      iconStyle,
                      shadowIbiza,
                      hoverState[11] ? iconHoverStyle : {},
                    ]"
                  >
                    <i class="bx bxs-comment-detail"></i>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="card radius-10 border shadow-none mb-0"
              :style="[
                interactionCardStyle,
                hoverState[12] ? interactionCardHoverStyle : {},
              ]"
              @mouseenter="hoverState[12] = true"
              @mouseleave="hoverState[12] = false"
            >
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <p class="mb-0 text-secondary font-13 fw-semibold">
                      Chia Sẻ Trận Đấu
                    </p>
                    <h3 class="my-1 fw-bold text-dark" :style="pageStyle">
                      85.4M
                    </h3>
                    <p class="mb-0 font-12 text-success">
                      <i class="bx bx-trending-up me-1"></i>+4.6% tuần này
                    </p>
                  </div>
                  <div
                    class="widgets-icons-2 bg-gradient-kyoto text-dark ms-auto"
                    :style="[
                      iconStyle,
                      shadowKyoto,
                      hoverState[12] ? iconHoverStyle : {},
                    ]"
                  >
                    <i class="bx bxs-share-alt"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end row-->

    <!-- HÀNG 5: 3 CHART PHỤ -->
    <div class="row row-cols-1 row-cols-lg-3 g-4">
      <!-- Doanh Thu Tuần -->
      <div class="col d-flex">
        <div
          class="card radius-12 shadow-sm w-100"
          :style="[cardStyle, hoverState[13] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[13] = true"
          @mouseleave="hoverState[13] = false"
        >
          <div class="card-body p-4">
            <p
              class="font-weight-bold mb-1 text-secondary"
              :style="uppercaseLabelStyle"
            >
              Doanh Thu Tuần
            </p>
            <div class="d-flex align-items-center mb-3">
              <div>
                <h3 class="mb-0 fw-bold text-dark" :style="pageStyle">
                  $89,540
                </h3>
              </div>
              <div>
                <span class="badge bg-light-success text-success ms-2 font-13"
                  ><i class="bx bxs-up-arrow-alt align-middle me-1"></i
                  >4.4%</span
                >
              </div>
            </div>
            <div :style="chartContainer0">
              <canvas id="chart3"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Tóm Tắt Giải Đấu -->
      <div class="col d-flex">
        <div
          class="card radius-12 shadow-sm w-100"
          :style="[cardStyle, hoverState[14] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[14] = true"
          @mouseleave="hoverState[14] = false"
        >
          <div class="card-header bg-transparent border-0 px-4 pt-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0 fw-bold text-dark" :style="pageStyle">
                  Trạng Thái Giải Đấu
                </h5>
                <p class="mb-0 text-secondary font-13">
                  Tóm tắt các sự kiện đang diễn ra
                </p>
              </div>
              <div class="dropdown ms-auto">
                <a
                  class="dropdown-toggle dropdown-toggle-nocaret text-secondary"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <i class="bx bx-dots-horizontal-rounded font-22"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                  <li>
                    <a class="dropdown-item py-2" href="javascript:;"
                      ><i class="bx bx-list-ul me-2"></i>Bảng chi tiết</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <div :style="chartContainer1">
              <canvas id="chart4"></canvas>
            </div>
          </div>
          <ul class="list-group list-group-flush border-top">
            <li
              class="list-group-item d-flex bg-transparent justify-content-between align-items-center py-2 border-0"
            >
              <div class="d-flex align-items-center gap-2">
                <span
                  :style="[legendDotStyle, { backgroundColor: '#2dce89' }]"
                ></span>
                <span class="text-dark font-14">Đã Hoàn Thành</span>
              </div>
              <span class="fw-bold text-dark font-14">{{
                dbData.tournament_status.completed
              }}</span>
            </li>
            <li
              class="list-group-item d-flex bg-transparent justify-content-between align-items-center py-2 border-0"
            >
              <div class="d-flex align-items-center gap-2">
                <span
                  :style="[legendDotStyle, { backgroundColor: '#11cdef' }]"
                ></span>
                <span class="text-dark font-14">Đang Diễn Ra</span>
              </div>
              <span class="fw-bold text-dark font-14">{{
                dbData.tournament_status.active
              }}</span>
            </li>
            <li
              class="list-group-item d-flex bg-transparent justify-content-between align-items-center py-2 border-0"
            >
              <div class="d-flex align-items-center gap-2">
                <span
                  :style="[legendDotStyle, { backgroundColor: '#f5365c' }]"
                ></span>
                <span class="text-dark font-14">Đang Chờ</span>
              </div>
              <span class="fw-bold text-dark font-14">{{
                dbData.tournament_status.pending
              }}</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Phân Loại Thể Loại Game -->
      <div class="col d-flex">
        <div
          class="card radius-12 shadow-sm w-100"
          :style="[cardStyle, hoverState[15] ? cardHoverStyle : {}]"
          @mouseenter="hoverState[15] = true"
          @mouseleave="hoverState[15] = false"
        >
          <div class="card-header bg-transparent border-0 px-4 pt-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0 fw-bold text-dark" :style="pageStyle">
                  Phân Loại Thể Loại Game
                </h5>
                <p class="mb-0 text-secondary font-13">
                  Số lượng giải đấu theo từng thể loại chính
                </p>
              </div>
              <div class="dropdown ms-auto">
                <a
                  class="dropdown-toggle dropdown-toggle-nocaret text-secondary"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <i class="bx bx-dots-horizontal-rounded font-22"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                  <li>
                    <a class="dropdown-item py-2" href="javascript:;"
                      ><i class="bx bx-category me-2"></i>Quản lý danh mục</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <div :style="chartContainer0">
              <canvas id="chart5"></canvas>
            </div>
          </div>
          <div class="row row-group border-top g-0 py-2">
            <div class="col text-center border-end">
              <h4 class="mb-0 text-danger fw-bold" :style="pageStyle">
                {{ getCategoryCount("MOBA") }}
              </h4>
              <p class="mb-0 text-secondary font-13">Giải Đấu MOBA</p>
            </div>
            <div class="col text-center">
              <h4 class="mb-0 text-success fw-bold" :style="pageStyle">
                {{ getCategoryCount("FPS") }}
              </h4>
              <p class="mb-0 text-secondary font-13">Giải Đấu FPS</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end row-->
  </div>
</template>

<script>
import $ from "jquery";
import { Chart } from "chart.js/auto";
import axios from "axios";
window.$ = window.jQuery = $;

export default {
  name: "DashboardAdmin",
  data() {
    return {
      charts: {},
      hoverState: {},

      // Core style tokens matching template design
      pageStyle: {
        fontFamily: "'Outfit', sans-serif",
      },
      cardStyle: {
        background: "rgba(255, 255, 255, 0.9)",
        backdropFilter: "blur(12px)",
        border: "1px solid rgba(243, 244, 246, 0.7)",
        borderRadius: "12px",
        transition: "all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1)",
        boxShadow: "0 4px 18px rgba(0, 0, 0, 0.02)",
      },
      cardHoverStyle: {
        transform: "translateY(-6px)",
        boxShadow: "0 12px 30px rgba(0, 0, 0, 0.06)",
        borderColor: "rgba(229, 231, 235, 0.9)",
      },
      uppercaseLabelStyle: {
        textTransform: "uppercase",
        fontSize: "11px",
        letterSpacing: "0.8px",
        fontWeight: "600",
        color: "#6b7280",
      },
      iconStyle: {
        width: "52px",
        height: "52px",
        display: "flex",
        alignItems: "center",
        justifyContent: "center",
        fontSize: "24px",
        borderRadius: "12px",
        transition: "all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1)",
      },
      iconHoverStyle: {
        transform: "scale(1.12) rotate(6deg)",
      },
      shadowScooter: { boxShadow: "0 4px 12px rgba(23, 234, 217, 0.3)" },
      shadowBloody: { boxShadow: "0 4px 12px rgba(248, 87, 166, 0.3)" },
      shadowOhhappiness: { boxShadow: "0 4px 12px rgba(0, 176, 155, 0.3)" },
      shadowBlooker: { boxShadow: "0 4px 12px rgba(255, 65, 108, 0.3)" },
      shadowCosmic: { boxShadow: "0 4px 12px rgba(138, 35, 135, 0.3)" },
      shadowIbiza: { boxShadow: "0 4px 12px rgba(238, 9, 121, 0.3)" },
      shadowKyoto: { boxShadow: "0 4px 12px rgba(100, 179, 244, 0.3)" },

      tableRowStyle: {
        transition: "background-color 0.2s ease",
      },
      productImgStyle: {
        width: "42px",
        height: "42px",
        borderRadius: "8px",
        objectFit: "cover",
      },
      badgePremiumStyle: {
        padding: "6px 12px",
        borderRadius: "30px",
        fontWeight: "600",
        fontSize: "11px",
        letterSpacing: "0.3px",
        display: "inline-flex",
        alignItems: "center",
        gap: "6px",
        textTransform: "uppercase",
      },
      badgeDotStyle: {
        width: "6px",
        height: "6px",
        borderRadius: "50%",
        display: "inline-block",
      },
      mapContainerStyle: {
        position: "relative",
        background: "#fafbfd",
        borderRadius: "10px",
        overflow: "hidden",
        border: "1px solid rgba(229, 231, 235, 0.5)",
        padding: "10px",
        boxShadow: "inset 0 2px 8px rgba(0, 0, 0, 0.01)",
      },
      legendDotStyle: {
        width: "10px",
        height: "10px",
        borderRadius: "50%",
        display: "inline-block",
      },
      interactionCardStyle: {
        transition: "all 0.3s ease",
        border: "1px solid rgba(243, 244, 246, 0.8)",
      },
      interactionCardHoverStyle: {
        transform: "translateX(4px)",
        backgroundColor: "rgba(249, 250, 251, 0.5)",
      },
      chartContainer1: { position: "relative", height: "330px", width: "100%" },
      chartContainer2: { position: "relative", height: "240px", width: "100%" },
      chartContainer0: { position: "relative", height: "220px", width: "100%" },

      chartIndicatorStyle: {
        width: "12px",
        height: "4px",
        borderRadius: "4px",
        display: "inline-block",
      },
      bgInfoGlow: {
        backgroundColor: "#14abef",
        boxShadow: "0 0 6px rgba(20, 171, 239, 0.5)",
      },
      bgWarningGlow: {
        backgroundColor: "#ffc107",
        boxShadow: "0 0 6px rgba(255, 193, 7, 0.5)",
      },

      liveBlink: true,
      blinkInterval: null,

      // Dashboard API data
      dbData: {
        total_sponsorship: 0,
        total_tournaments: 0,
        total_teams: 0,
        total_players: 0,
        tournament_status: { completed: 0, active: 0, pending: 0 },
        game_popularity: [],
        category_stats: [],
        months: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        monthly_revenue: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        monthly_viewers: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        geo_stats: [],
        recent_tournaments: [],
      },
    };
  },
  computed: {
    computedGamePopularity() {
      if (
        !this.dbData.game_popularity ||
        this.dbData.game_popularity.length === 0
      ) {
        return [];
      }
      const total =
        this.dbData.game_popularity.reduce(
          (acc, item) => acc + item.count,
          0,
        ) || 1;
      const colors = ["#2dce89", "#f5365c", "#11cdef", "#fb6340", "#8a2387"];
      const textClasses = [
        "text-success",
        "text-danger",
        "text-info",
        "text-warning",
        "text-secondary",
      ];
      const bgClasses = [
        "bg-light-success",
        "bg-light-danger",
        "bg-light-info",
        "bg-light-warning",
        "bg-light-secondary",
      ];
      return this.dbData.game_popularity.map((item, idx) => ({
        name: item.ten_game,
        count: item.count,
        percentage: Math.round((item.count / total) * 100),
        color: colors[idx % colors.length],
        textClass: textClasses[idx % textClasses.length],
        bgClass: bgClasses[idx % bgClasses.length],
      }));
    },
    computedCategoryStats() {
      if (
        !this.dbData.category_stats ||
        this.dbData.category_stats.length === 0
      ) {
        return [];
      }
      return this.dbData.category_stats.map((item) => ({
        name: item.ten_loai,
        count: item.count,
      }));
    },
    totalViewers() {
      if (!this.dbData.monthly_viewers) return "0M";
      const sum = this.dbData.monthly_viewers.reduce(
        (a, b) => parseFloat(a) + parseFloat(b),
        0,
      );
      return sum.toFixed(1) + "M";
    },
    averageViewers() {
      if (!this.dbData.monthly_viewers) return "0M";
      const sum = this.dbData.monthly_viewers.reduce(
        (a, b) => parseFloat(a) + parseFloat(b),
        0,
      );
      return (sum / 12).toFixed(2) + "M";
    },
    peakViewers() {
      if (
        !this.dbData.monthly_viewers ||
        this.dbData.monthly_viewers.length === 0
      )
        return "0M";
      return (
        Math.max(
          ...this.dbData.monthly_viewers.map((v) => parseFloat(v)),
        ).toFixed(1) + "M"
      );
    },
  },
  async mounted() {
    window.jQuery = $;
    window.$ = $;

    await this.fetchDashboardData();

    try {
      await import("../../../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js");
      await import("../../../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js");
      this.initMap();
      console.log("jquery version:", $.fn.jquery);
      console.log("$.isArray:", $.isArray);
      console.log("vectorMap:", $.fn.vectorMap);
    } catch (e) {
      console.error("Lỗi khi load thư viện VectorMap:", e);
    }

    this.initCharts();

    this.blinkInterval = setInterval(() => {
      this.liveBlink = !this.liveBlink;
    }, 800);
  },
  beforeUnmount() {
    if (this.blinkInterval) {
      clearInterval(this.blinkInterval);
    }
    try {
      $("#geographic-map-2").empty();
    } catch (e) {}

    Object.keys(this.charts).forEach((key) => {
      if (this.charts[key]) {
        this.charts[key].destroy();
      }
    });
  },
  methods: {
    async fetchDashboardData() {
      try {
        const response = await axios.get(
          "http://127.0.0.1:8000/api/admin/dashboard/get-data",
        );
        if (response.data && response.data.status) {
          this.dbData = response.data.data;
        }
      } catch (e) {
        console.error("Lỗi khi fetch dữ liệu dashboard:", e);
      }
    },
    formatVND(value) {
      if (!value) return "0 đ";
      const val = parseFloat(value);
      if (val >= 1000000000) {
        return (val / 1000000000).toFixed(1) + " tỷ VNĐ";
      }
      if (val >= 1000000) {
        return (val / 1000000).toFixed(1) + " triệu VNĐ";
      }
      return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
        maximumFractionDigits: 0,
      }).format(val);
    },
    getCategoryCount(name) {
      const found = this.dbData.category_stats.find(
        (item) => item.ten_loai.toUpperCase() === name.toUpperCase(),
      );
      return found ? found.count + " Giải" : "0 Giải";
    },
    initMap() {
      try {
        if (!this.dbData.geo_stats || this.dbData.geo_stats.length === 0)
          return;

        $("#geographic-map-2").vectorMap({
          map: "world_mill_en",
          backgroundColor: "transparent",
          borderColor: "#ffffff",
          borderOpacity: 0.25,
          borderWidth: 1.5,
          zoomOnScroll: false,
          color: "#e2e8f0",
          regionStyle: {
            initial: {
              fill: "#e4e7eb",
              "fill-opacity": 1,
              stroke: "#ffffff",
              "stroke-width": 1.2,
              "stroke-opacity": 0.4,
            },
            hover: {
              fill: "#cbd5e1",
              "fill-opacity": 0.9,
              cursor: "pointer",
            },
          },
          markerStyle: {
            initial: {
              r: 6,
              fill: "#14abef",
              "fill-opacity": 1,
              stroke: "#ffffff",
              "stroke-width": 2.5,
              "stroke-opacity": 0.5,
            },
            hover: {
              r: 8,
              "stroke-width": 3,
              cursor: "pointer",
            },
          },
          enableZoom: false,
          markers: this.dbData.geo_stats.map((item) => {
            let fillVal = "#14abef";
            if (item.bgClass === "bg-danger") fillVal = "#f5365c";
            else if (item.bgClass === "bg-success") fillVal = "#2dce89";
            else if (item.bgClass === "bg-warning") fillVal = "#ffc107";
            else if (item.bgClass === "bg-secondary") fillVal = "#8a2387";
            return {
              latLng: item.marker,
              name: `${item.name} (${item.percentage}%)`,
              style: { fill: fillVal },
            };
          }),
          focusOn: {
            x: 0.82,
            y: 0.61,
            scale: 5,
          },
          showTooltip: true,
        });
      } catch (e) {
        console.error("Lỗi khi khởi tạo bản đồ vectorMap:", e);
      }
    },
    initCharts() {
      // Chart 1: Sales Overview (Line chart)
      const ctx1 = document.getElementById("chart1").getContext("2d");

      const gradientStroke1 = ctx1.createLinearGradient(0, 0, 0, 300);
      gradientStroke1.addColorStop(0, "rgba(20, 171, 239, 0.35)");
      gradientStroke1.addColorStop(1, "rgba(20, 171, 239, 0.0)");

      const gradientStroke2 = ctx1.createLinearGradient(0, 0, 0, 300);
      gradientStroke2.addColorStop(0, "rgba(255, 193, 7, 0.35)");
      gradientStroke2.addColorStop(1, "rgba(255, 193, 7, 0.0)");

      this.charts.chart1 = new Chart(ctx1, {
        type: "line",
        data: {
          labels: this.dbData.months || [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "Lượt Xem (M)",
              data: this.dbData.monthly_viewers,
              borderColor: "#14abef",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              tension: 0.4,
              pointRadius: 4,
              pointHoverRadius: 6,
              pointBackgroundColor: "#14abef",
              pointBorderColor: "#fff",
              pointBorderWidth: 2,
            },
            {
              label: "Doanh Thu (Tr. VNĐ)",
              data: this.dbData.monthly_revenue,
              borderColor: "#ffc107",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              tension: 0.4,
              pointRadius: 4,
              pointHoverRadius: 6,
              pointBackgroundColor: "#ffc107",
              pointBorderColor: "#fff",
              pointBorderWidth: 2,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: "rgba(17, 24, 39, 0.95)",
              titleFont: { size: 13, weight: "bold" },
              bodyFont: { size: 12 },
              padding: 12,
              cornerRadius: 8,
              boxWidth: 8,
              boxHeight: 8,
              usePointStyle: true,
            },
          },
          scales: {
            x: {
              grid: { display: false },
              ticks: {
                font: { size: 11, weight: "500" },
                color: "#9ca3af",
              },
            },
            y: {
              grid: { color: "rgba(243, 244, 246, 0.6)" },
              ticks: {
                font: { size: 11, weight: "500" },
                color: "#9ca3af",
              },
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 2: Popular Games (Doughnut chart)
      const ctx2 = document.getElementById("chart2").getContext("2d");
      const gameLabels = this.computedGamePopularity.map((item) => item.name);
      const gameData = this.computedGamePopularity.map((item) => item.count);
      const gameColors = this.computedGamePopularity.map((item) => item.color);

      this.charts.chart2 = new Chart(ctx2, {
        type: "doughnut",
        data: {
          labels: gameLabels.length
            ? gameLabels
            : ["Liên Minh Huyền Thoại", "Valorant", "CS2", "PUBG"],
          datasets: [
            {
              data: gameData.length ? gameData : [65, 25, 14, 10],
              backgroundColor: gameColors.length
                ? gameColors
                : ["#2dce89", "#f5365c", "#11cdef", "#fb6340"],
              borderWidth: 4,
              borderColor: "#fff",
              hoverOffset: 4,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: "rgba(17, 24, 39, 0.95)",
              padding: 12,
              cornerRadius: 8,
            },
          },
          cutout: "78%",
        },
      });

      // Chart 3: Weekly Revenue (Bar chart)
      const ctx3 = document.getElementById("chart3").getContext("2d");
      const gradientBar3 = ctx3.createLinearGradient(0, 0, 0, 220);
      gradientBar3.addColorStop(0, "#17ead9");
      gradientBar3.addColorStop(1, "#6078ea");

      this.charts.chart3 = new Chart(ctx3, {
        type: "bar",
        data: {
          labels: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
          datasets: [
            {
              label: "Doanh Thu (Tr.đ)",
              data: [120, 150, 100, 180, 220, 250, 300],
              backgroundColor: gradientBar3,
              borderRadius: 6,
              barPercentage: 0.55,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: "rgba(17, 24, 39, 0.95)",
              padding: 10,
              cornerRadius: 6,
            },
          },
          scales: {
            x: {
              grid: { display: false },
              ticks: {
                font: { size: 11 },
                color: "#9ca3af",
              },
            },
            y: {
              grid: { color: "rgba(243, 244, 246, 0.6)" },
              ticks: {
                font: { size: 11 },
                color: "#9ca3af",
              },
            },
          },
        },
      });

      // Chart 4: Tournament Status (Doughnut chart)
      const ctx4 = document.getElementById("chart4").getContext("2d");
      this.charts.chart4 = new Chart(ctx4, {
        type: "doughnut",
        data: {
          labels: ["Đã Hoàn Thành", "Đang Diễn Ra", "Đang Chờ"],
          datasets: [
            {
              data: [
                this.dbData.tournament_status.completed,
                this.dbData.tournament_status.active,
                this.dbData.tournament_status.pending,
              ],
              backgroundColor: ["#2dce89", "#11cdef", "#f5365c"],
              borderWidth: 4,
              borderColor: "#fff",
              hoverOffset: 4,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: "rgba(17, 24, 39, 0.95)",
              padding: 12,
              cornerRadius: 8,
            },
          },
          cutout: "72%",
        },
      });

      // Chart 5: Top Categories (Bar chart)
      const ctx5 = document.getElementById("chart5").getContext("2d");
      const gradientBar5 = ctx5.createLinearGradient(0, 0, 0, 220);
      gradientBar5.addColorStop(0, "#f857a6");
      gradientBar5.addColorStop(1, "#ff5858");

      const catLabels = this.computedCategoryStats.map((item) => item.name);
      const catData = this.computedCategoryStats.map((item) => item.count);

      this.charts.chart5 = new Chart(ctx5, {
        type: "bar",
        data: {
          labels: catLabels.length
            ? catLabels
            : ["MOBA", "FPS", "Battle Royale"],
          datasets: [
            {
              label: "Số Giải Đấu",
              data: catData.length ? catData : [6, 8, 2],
              backgroundColor: gradientBar5,
              borderRadius: 6,
              barPercentage: 0.5,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: "rgba(17, 24, 39, 0.95)",
              padding: 10,
              cornerRadius: 6,
            },
          },
          scales: {
            x: {
              grid: { display: false },
              ticks: {
                font: { size: 11 },
                color: "#9ca3af",
              },
            },
            y: {
              grid: { color: "rgba(243, 244, 246, 0.6)" },
              ticks: {
                font: { size: 11 },
                color: "#9ca3af",
              },
            },
          },
        },
      });
    },
  },
};
</script>
