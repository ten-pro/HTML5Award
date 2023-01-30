describe('View Code Testing', () => {
    it('Check if all components are rendering correctly', () => {
        const wrapper = shallowMount(GameMain, {
            data: () => ({
                state: {
                    money: "500",
                    misyain: "20",
                    nowkousuu: "5",
                    maxkousuu: "10",
                    nouki: "20",
                    nowday: "1",
                    nowstate: "プレイ中",
                    nowimg: "0"
                }
            })
        });

        // Check if tate components are rendering correctly
        expect(wrapper.find('.tate').exists()).toBe(true);
        expect(wrapper.find('p').text()).toBe("資産 500万円 未所属社員 20人 工数 5/10 案件納期 残り20日 1日目");
        

        expect(wrapper.find('.busyo').exists()).toBe(true);
        expect(wrapper.find('Jinji').exists()).toBe(true);
        expect(wrapper.find('Kaihatu').exists()).toBe(true);
        expect(wrapper.find('Keiri').exists()).toBe(true);
        expect(wrapper.find('Kenkou').exists()).toBe(true);
        
        // Check if remote_controller components are rendering correctly 
        expect(wrapper.find('.remote_controller').exists()).toBe(true);
        expect(wrapper.find('.remote_moji').text()).toBe("状態 プレイ中");
        expect(wrapper.find('.remote_img').exists()).toBe(true);
        expect(wrapper.find('.remote_naka').text()).toBe("3 5");

        // Check if img components are rendering correctly 
        expect(wrapper.find('img').exists()).toBe(true);

        // Check if teleport and modal components are rendering correctly 
        expect(wrapper.find('teleport').exists()).toBe(true);
        expect(wrapper.find('.modal').exists()).toBe(true);
        expect(wrapper.find('.modal-content').exists()).toBe(true);
        expect(wrapper.find('.updown').exists()).toBe(true);
        expect(wrapper.find('.eventtitle').text()).toBe("！イベント発生！");
        expect(wrapper.find('.eventmessage').text()).toBe("");
    });
});
