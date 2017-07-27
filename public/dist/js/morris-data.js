new Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'questionsBar',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        { month: 'Январь', Вопросы: 20 },
        { month: 'Февраль', Вопросы: 30 },
        { month: 'Март', Вопросы: 10 },
        { month: 'Апрель', Вопросы: 50 },
        { month: 'Май', Вопросы: 80 }
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'month',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['Вопросы'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Вопросы'],
    resize: true
});

new Morris.Donut({
    element: 'usersDonut',

    data: [
        {label: 'Клиенты', value: 20},
        {label: 'Юристы', value: 10},
        {label: 'Юридические компании', value: 1},
    ],

    xkey: 'label',

    ykeys: ['value'],
    resize: true
});

new Morris.Donut({
    element: 'questionsDonut',

    data: [
        {label: 'Бесплатные', value: 20},
        {label: 'Платные', value: 10},
    ],

    xkey: 'label',

    ykeys: ['value'],
    resize: true
});