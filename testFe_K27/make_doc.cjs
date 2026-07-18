const fs = require('fs');
const path = require('path');
const { 
    Document, Packer, Paragraph, TextRun, Table, TableRow, TableCell, 
    WidthType, AlignmentType, BorderStyle, ShadingType 
} = require('docx');

const groupData = [
    {
        title: 'Nhóm 1: Thống Kê Giải Đấu & Quy Mô',
        questions: [
            {
                number: 1,
                title: 'Thống kê số lượng giải đấu theo từng Năm',
                route: "Route::get('/api/admin/thong-ke/nhom-1/cau-1', [ThongKeController::class, 'nhom1Cau1']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom1Cau1',
                description: 'Thống kê tổng số lượng giải đấu được tổ chức phân bổ theo từng năm từ năm chọn đến năm chọn'
            },
            {
                number: 2,
                title: 'Thống kê tổng số giải đấu & tổng số đội tham gia phân theo Tựa Game',
                route: "Route::get('/api/admin/thong-ke/nhom-1/cau-2', [ThongKeController::class, 'nhom1Cau2']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom1Cau2',
                description: 'Thống kê số giải đấu đã tổ chức và tổng số đội tham gia phân loại theo từng tựa Game từ ngày chọn đến ngày chọn'
            }
        ]
    },
    {
        title: 'Nhóm 2: Thống Kê Tài Trợ & Ngân Sách',
        questions: [
            {
                number: 1,
                title: 'Thống kê tổng tiền tài trợ nhận được theo từng Tháng',
                route: "Route::get('/api/admin/thong-ke/nhom-2/cau-1', [ThongKeController::class, 'nhom2Cau1']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom2Cau1',
                description: 'Thống kê tổng kinh phí ngân sách tài trợ nhận được tổng hợp theo từng tháng/năm'
            },
            {
                number: 2,
                title: 'Thống kê tất cả các Nhà tài trợ và tổng số tiền tài trợ',
                route: "Route::get('/api/admin/thong-ke/nhom-2/cau-2', [ThongKeController::class, 'nhom2Cau2']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom2Cau2',
                description: 'Thống kê danh sách tất cả các nhà tài trợ cùng số giải đấu tham gia và tổng ngân sách đóng góp từ năm chọn đến năm chọn'
            }
        ]
    },
    {
        title: 'Nhóm 3: Thống Kê Thứ Hạng & Điểm Số Đội Tuyển',
        questions: [
            {
                number: 1,
                title: 'Thống kê số lần đoạt giải Quán Quân (Hạng 1) của các đội tuyển',
                route: "Route::get('/api/admin/thong-ke/nhom-3/cau-1', [ThongKeController::class, 'nhom3Cau1']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom3Cau1',
                description: 'Thống kê số lần đoạt chức vô địch (Hạng 1) của từng đội tuyển trong khoảng thời gian chọn'
            },
            {
                number: 2,
                title: 'Thống kê tổng điểm và điểm trung bình tích lũy của các đội tuyển',
                route: "Route::get('/api/admin/thong-ke/nhom-3/cau-2', [ThongKeController::class, 'nhom3Cau2']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom3Cau2',
                description: 'Thống kê tổng điểm thành tích và điểm số trung bình tích lũy qua các mùa giải của các đội tuyển'
            }
        ]
    },
    {
        title: 'Nhóm 4: Thống Kê Tuyển Thủ & Quốc Tịch',
        questions: [
            {
                number: 1,
                title: 'Thống kê số lượng tuyển thủ phân theo Vị trí thi đấu',
                route: "Route::get('/api/admin/thong-ke/nhom-4/cau-1', [ThongKeController::class, 'nhom4Cau1']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom4Cau1',
                description: 'Thống kê cơ cấu số lượng tuyển thủ chuyên nghiệp phân bổ theo từng vị trí thi đấu (Top, Jungle, Mid, AD Carry, Support)'
            },
            {
                number: 2,
                title: 'Thống kê số lượng tuyển thủ phân theo Quốc tịch',
                route: "Route::get('/api/admin/thong-ke/nhom-4/cau-2', [ThongKeController::class, 'nhom4Cau2']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom4Cau2',
                description: 'Thống kê số lượng tuyển thủ gia nhập thi đấu phân theo từng Quốc tịch'
            }
        ]
    },
    {
        title: 'Nhóm 5: Thống Kê Trận Đấu & Tỷ Số',
        questions: [
            {
                number: 1,
                title: 'Thống kê số lượng trận đấu diễn ra theo từng Tháng',
                route: "Route::get('/api/admin/thong-ke/nhom-5/cau-1', [ThongKeController::class, 'nhom5Cau1']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom5Cau1',
                description: 'Thống kê tổng số trận đấu eSports được tổ chức diễn ra theo từng tháng trong khoảng thời gian chọn'
            },
            {
                number: 2,
                title: 'Thống kê tổng số ván thắng và số trận thi đấu của các đội tuyển',
                route: "Route::get('/api/admin/thong-ke/nhom-5/cau-2', [ThongKeController::class, 'nhom5Cau2']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom5Cau2',
                description: 'Thống kê tổng số trận thi đấu và tổng số ván thắng đạt được của mỗi đội tuyển'
            }
        ]
    },
    {
        title: 'Nhóm 6: Thống Kê Tin Tức & Truyền Thông',
        questions: [
            {
                number: 1,
                title: 'Thống kê số lượng bài viết tin tức đăng tải theo từng Tháng',
                route: "Route::get('/api/admin/thong-ke/nhom-6/cau-1', [ThongKeController::class, 'nhom6Cau1']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom6Cau1',
                description: 'Thống kê số bài viết truyền thông tin tức được xuất bản theo từng tháng'
            },
            {
                number: 2,
                title: 'Thống kê số lượng bài viết tin tức phân theo từng Tựa Game',
                route: "Route::get('/api/admin/thong-ke/nhom-6/cau-2', [ThongKeController::class, 'nhom6Cau2']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom6Cau2',
                description: 'Thống kê số lượng bài viết tin tức truyền thông cập nhật phân loại theo từng tựa Game'
            }
        ]
    },
    {
        title: 'Nhóm 7: Thống Kê Người Dùng & Chức Vụ',
        questions: [
            {
                number: 1,
                title: 'Thống kê số lượng tài khoản người dùng đăng ký mới theo từng Tháng',
                route: "Route::get('/api/admin/thong-ke/nhom-7/cau-1', [ThongKeController::class, 'nhom7Cau1']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom7Cau1',
                description: 'Thống kê số lượng tài khoản thành viên đăng ký mới hệ thống phân bổ theo tháng'
            },
            {
                number: 2,
                title: 'Thống kê số lượng tài khoản thuộc từng Chức Vụ (Role)',
                route: "Route::get('/api/admin/thong-ke/nhom-7/cau-2', [ThongKeController::class, 'nhom7Cau2']);",
                method: 'GET',
                controller: 'ThongKeController',
                functionName: 'nhom7Cau2',
                description: 'Thống kê số lượng người dùng hệ thống phân bổ theo các vai trò/chức vụ'
            }
        ]
    }
];

const children = [];

// Title of Document
children.push(
    new Paragraph({
        alignment: AlignmentType.CENTER,
        spacing: { after: 300 },
        children: [
            new TextRun({
                text: "BÁO CÁO TỔNG HỢP CÁC API THỐNG KÊ (7 NHÓM - 14 CÂU)",
                bold: true,
                size: 32, // 16pt
                color: "1A365D"
            })
        ]
    })
);

groupData.forEach((group) => {
    // Group Header
    children.push(
        new Paragraph({
            spacing: { before: 360, after: 180 },
            children: [
                new TextRun({
                    text: group.title,
                    bold: true,
                    size: 26, // 13pt
                    color: "1A365D"
                })
            ]
        })
    );

    group.questions.forEach((q) => {
        // Question Title
        children.push(
            new Paragraph({
                spacing: { before: 200, after: 100 },
                children: [
                    new TextRun({
                        text: `Câu ${q.number}: ${q.title}`,
                        bold: true,
                        size: 24, // 12pt
                        color: "000000"
                    })
                ]
            })
        );

        // Route Table (shaded background box matching the image)
        const routeCell = new TableCell({
            children: [
                new Paragraph({
                    spacing: { before: 80, after: 80 },
                    children: [
                        new TextRun({
                            text: q.route,
                            font: "Consolas",
                            size: 19,
                            color: "1A202C"
                        })
                    ]
                })
            ],
            shading: {
                fill: "EBF8FF", // Light soft blue-grey shading matching image
                val: ShadingType.CLEAR
            },
            borders: {
                top: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
                bottom: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" },
                left: { style: BorderStyle.SINGLE, size: 24, color: "3182CE" }, // Left accent line
                right: { style: BorderStyle.NONE, size: 0, color: "FFFFFF" }
            },
            width: {
                size: 100,
                type: WidthType.PERCENTAGE
            }
        });

        const routeTable = new Table({
            rows: [new TableRow({ children: [routeCell] })],
            width: { size: 100, type: WidthType.PERCENTAGE }
        });

        children.push(routeTable);

        // Metadata Items
        children.push(
            new Paragraph({
                spacing: { before: 120, after: 40 },
                children: [
                    new TextRun({ text: "-Methods: ", size: 22 }),
                    new TextRun({ text: q.method, size: 22 })
                ]
            })
        );

        children.push(
            new Paragraph({
                spacing: { before: 40, after: 40 },
                children: [
                    new TextRun({ text: "-Controller: ", size: 22 }),
                    new TextRun({ text: q.controller, size: 22 })
                ]
            })
        );

        children.push(
            new Paragraph({
                spacing: { before: 40, after: 40 },
                children: [
                    new TextRun({ text: "-Function: ", size: 22 }),
                    new TextRun({ text: q.functionName, size: 22 })
                ]
            })
        );

        children.push(
            new Paragraph({
                spacing: { before: 40, after: 140 },
                children: [
                    new TextRun({ text: "-Mô tả: ", size: 22 }),
                    new TextRun({ text: q.description, size: 22 })
                ]
            })
        );

        // Image Placeholder Box (Empty box for user to paste screenshot)
        const imageCell = new TableCell({
            children: [
                new Paragraph({
                    alignment: AlignmentType.CENTER,
                    spacing: { before: 260, after: 260 },
                    children: [
                        new TextRun({
                            text: "[ KHUNG DÁN ẢNH KẾT QUẢ / BIỂU ĐỒ MẪU ]",
                            color: "A0AEC0",
                            italic: true,
                            size: 19
                        })
                    ]
                })
            ],
            shading: {
                fill: "FAFAFA",
                val: ShadingType.CLEAR
            },
            borders: {
                top: { style: BorderStyle.DASHED, size: 8, color: "CBD5E0" },
                bottom: { style: BorderStyle.DASHED, size: 8, color: "CBD5E0" },
                left: { style: BorderStyle.DASHED, size: 8, color: "CBD5E0" },
                right: { style: BorderStyle.DASHED, size: 8, color: "CBD5E0" }
            },
            width: {
                size: 100,
                type: WidthType.PERCENTAGE
            }
        });

        const imageTable = new Table({
            rows: [new TableRow({ children: [imageCell] })],
            width: { size: 100, type: WidthType.PERCENTAGE }
        });

        children.push(imageTable);

        // Spacing between questions
        children.push(new Paragraph({ spacing: { after: 200 }, children: [] }));
    });
});

const doc = new Document({
    sections: [
        {
            properties: {},
            children: children
        }
    ]
});

Packer.toBuffer(doc).then((buffer) => {
    const outputPath = 'C:\\xampp\\htdocs\\TestCodeK27\\BaoCao_ThongKe_7Nhom.docx';
    fs.writeFileSync(outputPath, buffer);
    console.log('SUCCESS_FILE_CREATED:' + outputPath);
}).catch(err => {
    console.error('❌ Lỗi tạo file Word:', err);
});
