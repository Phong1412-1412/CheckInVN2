//
//  CLProvince.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import Foundation

struct Province: Hashable, Codable {
    let id: Int
    let provinceName: String
    let description: String
    let image: String
    let favoriteChecked: Int
}
