module.exports = {
    extends: ['@commitlint/config-conventional'],
    rules: {
        'type-enum': [
            2,
            'always',
            [
                'feat',     // tính năng mới
                'fix',      // bug fix
                'refactor', // refactor không thêm feature/fix bug
                'chore',    // thay đổi tooling, config
                'docs',     // documentation
                'style',    // formatting, không đổi logic
                'test',     // thêm/sửa test
                'perf',     // cải thiện performance
                'revert',   // revert commit
                'ci',       // CI/CD changes
            ],
        ],
        'subject-case': [2, 'always', 'lower-case'],
        'subject-max-length': [2, 'always', 100],
    },
};
