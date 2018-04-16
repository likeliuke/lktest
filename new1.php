//获取前台提交数据
			//一、抵押成数上限
			$data['channelName'] = input::get('channelName');//产品名称
			$data['planName'] = input::get('planName');//产品别名(仅供微信端显示)
			$data['collateralType'] = input::get('collateralType');//抵押类型
			$data['borrowerType'] = input::get('borrowerType');//借款人类型
			$data['loanType'] = input::get('loanType');//借款类型
			$data['productName'] = input::get('productName');//产品名称（产品说明）
			
			$data['popurlarHousingPercentage'] = input::get('popurlarHousingPercentage');//普通住宅成数
			$data['hPopurlarHousingPercentage'] = input::get('hPopurlarHousingPercentage');//
			$data['noPopurlarHousingPercentage'] = input::get('noPopurlarHousingPercentage');//非普通住宅成数
			$data['hNoPopurlarHousingPercentage'] = input::get('hNoPopurlarHousingPercentage');//
			$data['movingHousePercentage'] = input::get('movingHousePercentage');//动迁房满3年成数
			$data['hMovingHousePercentage'] = input::get('hMovingHousePercentage');//
			$data['gardenHousePercentage'] = input::get('gardenHousePercentage');//联列和花园住宅成数
			$data['hGardenHousePercentage'] = input::get('hGardenHousePercentage');//
			$data['villaPercentage'] = input::get('villaPercentage');//别墅、花园洋房成数
			$data['hVillaPercentage'] = input::get('hVillaPercentage');//
			$data['shopPercentage'] = input::get('shopPercentage');//商铺、办公楼成数
			$data['hShopPercentage'] = input::get('hShopPercentage');//
			$data['plantPercentage'] = input::get('plantPercentage');//厂房成数
			$data['hPlantPercentage'] = input::get('hPlantPercentage');//
			
			//二、费率、额度、期限
			
			$data['rate'] = input::get('rate');//费率
			$data['highestRate'] = input::get('highestRate');//最高费率
			$data['rateType'] = input::get('rateType');//费率模式
			$data['additionalAmount'] = input::get('additionalAmount');//附加费用
			$data['additionalAmountPercent'] = input::get('additionalAmountPercent');//附加费用百分比
			
			$data['limit'] = input::get('limit');//订单额度（万元）
			$data['highestLimit'] = input::get('highestLimit');//
			$data['houseLimit'] = input::get('houseLimit');//房产额度（万元）
			$data['highestHouseLimit'] = input::get('highestHouseLimit');//
			
			$data['deadline'] = input::get('deadline');//期限
			if($data['deadline'] != ''){
				$data['deadlineMonth'] = $this -> deadlineDispose($data['deadline']);//期限的月份	
			}
			
			$data['repaymentStyle'] = input::get('repaymentStyle');//还款方式
			$data['prepayment'] = input::get('prepayment');//提前还款		
			
			//三、申请人条件
			$data['age'] = input::get('age');//年龄
			$data['highestAge'] = input::get('highestAge');//年龄
			
			$data['notAllowHongMacaoTaiwan'] = input::get('isHongMacaoTaiwan');//港澳台是否可做
			$data['notAllowFujian'] = input::get('isFujian');//福建是否可做
			$data['notAllowWenzhou'] = input::get('notAllowWenzhou');//温州人是否不做
			$data['notAllowDisabled'] = input::get('isDisabled');//残障人士是否可做
			$data['notAllowListJustice'] = input::get('isJustice');//公检法/军队/黄赌毒黑是否可做（敏感行业）
			$data['notAllowMate'] = input::get('notAllowMate');//不做行业配偶（敏感行业）
			$data['notAllowlitigation'] = input::get('notAllowlitigation');//未结诉讼是否不做
			$data['notAllowIllegalRecord'] = input::get('notAllowIllegalRecord');//违法记录是否不做
			$data['notAllowBorrowingDisputes'] = input::get('notAllowBorrowingDisputes');//借贷纠纷是否不做
			$data['notAllowExecute'] = input::get('isExecute');//执行是否可做
			$data['notAllowOverdue'] = input::get('isOverdue');//逾期是否可做
			
			//四、房产要求
			$data['notAllowListJinshan'] = input::get('isJinshan');//金山/崇明/奉贤是否可做（不做区域）
			$data['estateRequirement'] = input::get('estateRequirement');//房产要求（房产属于）
			
			$data['highestHouseAge'] = input::get('highestHouseAge');//住宅最大房龄
			$data['highestVillaAge'] = input::get('highestVillaAge');//别墅最大房龄
			$data['highestShopAge'] = input::get('highestShopAge');//商铺办公楼最大房龄
			
			$data['notAllowUnderAge'] = input::get('isUnderAge');//权利人有未成年是否不做
			$data['notAllowOldPeople'] = input::get('isOldPeople');//权利人有老人是否不做
			$data['notAllowBookletUnderAge'] = input::get('notAllowBookletUnderAge');//户口本有未成年人是否不做（是，否）
			$data['notAllowBookletOldPeople'] = input::get('notAllowBookletOldPeople');//户口本有老年人是否不做（是，否）
			
			//五、放款条件
			$data['terms'] = input::get('terms');//放款条件
			
			//六、提交资料
			$data['submitData'] = input::get('submitData');//提交资料 
			
			//七、其他
			$data['channelStatus'] = input::get('channelStatus');//产品状态
			$data['createId'] = $admin['PKID'];//创建人id
			
			//校验数据
			$datacheck = $this -> datacheck($data);
			if(!is_numeric($datacheck)){
				return $datacheck;
			}